<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Ptv\Filament\Actions\Header;

use Illuminate\Support\Str;
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Actions\Action;
use Modules\Sigma\Models\Ana02f;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Filament\Notifications\Notification;
use Modules\Performance\Models\Individuale;
use Modules\Performance\Models\StabiDirigente;

class ImportValutatoriAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'import_valutatori_';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('Importa XLS')
        ->icon('heroicon-o-arrow-up-tray')
        ->form([
            \Filament\Forms\Components\FileUpload::make('file')
                ->label('File XLS')
                ->acceptedFileTypes([
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                ])
                ->required(),
            \Filament\Forms\Components\TextInput::make('header_row')
                ->label('Riga intestazione')
                ->helperText('Inserisci il numero della riga che contiene le intestazioni delle colonne')
                ->numeric()
                ->default(1)
                ->required()
                ->minValue(1),
            \Filament\Forms\Components\TextInput::make('anno'),
        ])
        ->action(function (array $data): void {
            $path = storage_path('app/public/'.$data['file']);
            $headerRowIndex = (int) $data['header_row'];

            $spreadsheet = IOFactory::load($path);
            $worksheet = $spreadsheet->getActiveSheet();

            // Ottieni le intestazioni dalla riga specificata
            $headers = [];
            $headerRow = $worksheet->getRowIterator($headerRowIndex)->current();
            foreach ($headerRow->getCellIterator() as $cell) {
                $headers[] = Str::slug(trim((string) $cell->getValue()));
            }

            // Raccogli i dati dalle righe successive
            $rows = [];
            foreach ($worksheet->getRowIterator($headerRowIndex + 1) as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                foreach ($cellIterator as $index => $cell) {
                    $columnIndex = $cell->getColumn();
                    $headerIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnIndex) - 1;

                    if (isset($headers[$headerIndex])) {
                        $key = $headers[$headerIndex];
                        $rowData[$key] = $cell->getValue();
                    }
                }

                if (! empty(array_filter($rowData))) {
                    $rows[] = $rowData;
                }
            }
            $anno = intval($data['anno']);

            $this->syncValutatore($anno,$rows);
        });
    }

    public function syncValutatore(int $anno, array $rows)
    {
        foreach ($rows as $row) {
            $email = trim($row['testo']);

            $ana02f = Ana02f::where('emaind', $email)->first();
            if (null == $ana02f) {
                Notification::make()
                ->title('ERROR')
                ->body('nessun utente in ana02f con mail ['.$email.']')
                ->danger()
                ->persistent()
                ->send();
                continue;
            }
            $matr = $ana02f?->matr;
            $ente = $ana02f?->ente ?? '90';
            $nome = $ana02f?->conome.' '.$ana02f?->nome;

            $valutatore = StabiDirigente::where('anno', $anno)
                ->whereRaw('valutatore_id = id')
                ->where('email', $email)
                // ->ddRawSql()
                ->first();
            if (null == $valutatore) {
                $valutatore = StabiDirigente::updateOrCreate([
                    'anno' => $anno,
                    'email' => $email,
                ], [
                    'nome_diri' => $nome,
                    'ente' => $ente,
                    'matr' => $matr,
                ]);
                // dddx($valutatore);
                $up = [
                    // 'nome_diri'=>$nome,

                    'email' => $email,

                    'valutatore_id' => $valutatore->id,
                ];
                $valutatore->update($up);
            }

            $valutatore_id = $valutatore->id;

            $cond = Individuale::updateOrCreate(
                [
                    'anno' => $anno,
                    //'quadrimestre' => $quadrimestre,
                    'matr' => $row['matricola'],
                ], [
                    'valutatore_id' => $valutatore_id,
                ]);

            // dddx($cond);
        }
    }
}
