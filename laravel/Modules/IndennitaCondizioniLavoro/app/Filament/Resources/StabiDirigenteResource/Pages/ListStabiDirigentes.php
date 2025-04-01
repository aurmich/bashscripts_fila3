<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource\Pages;

use Illuminate\Support\Str;
use Filament\Actions\Action;
use Modules\Sigma\Models\Ana02f;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Filament\Pages\Actions\CreateAction;
use Filament\Tables\Enums\FiltersLayout;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\ListStabiDirigentes as PtvListStabiDirigentes;
use Filament\Notifications\Notification;

class ListStabiDirigentes extends PtvListStabiDirigentes
{
    protected static string $resource = StabiDirigenteResource::class;

    // protected function getTableFiltersLayout(): ?string {
    //    return FiltersLayout::AboveContent;
    // }

    // protected function getHeaderActions(): array {
    //    return [
    //        CreateAction::make(),
    //    ];
    // }

    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            Action::make('importXLS')
                ->label('Importa XLS')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    \Filament\Forms\Components\FileUpload::make('file')
                        ->label('File XLS')
                        ->acceptedFileTypes([
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
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
                    \Filament\Forms\Components\TextInput::make('quadrimestre'),
                ])
                ->action(function (array $data): void {
                    $path = storage_path('app/public/' . $data['file']);
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
                        
                        if (!empty(array_filter($rowData))) {
                            $rows[] = $rowData;
                        }
                    }
                    $anno=intval($data['anno']);
                    $quadrimestre=intval($data['quadrimestre']);
                    $this->syncValutatore($anno,$quadrimestre,$rows);
                }),
        ];
    }


    public function syncValutatore(int $anno,int $quadrimestre,array $rows){

        //$to_fix=StabiDirigente::where('anno',$anno)->where('email',null)->get();
        



        foreach($rows as $row){
           /*
            $valutatore=StabiDirigente::where('anno',$anno)
                ->whereRaw('valutatore_id = id')
                ->where('email',$row['testo'])
                ->first();

            dddx($valutatore);
            */
            $email=trim($row['testo']);

            $ana02f=Ana02f::where('emaind',$email)->first();
            if($ana02f==null){
                Notification::make()
                ->title('ERROR')
                ->body('nessun utente in ana02f con mail ['.$email.']')
                ->danger()
                ->persistent()
                ->send();
                continue;
            }
            $matr=$ana02f?->matr;
            $ente=$ana02f?->ente ?? '90';
            $nome=$ana02f?->conome.' '.$ana02f?->nome;



            $valutatore=StabiDirigente::where('anno',$anno)
                ->whereRaw('valutatore_id = id')
                ->where('email',$email)
                //->ddRawSql()
                ->first();
            if($valutatore==null){
                $valutatore=StabiDirigente::updateOrCreate([
                    'anno'=>$anno,
                    'email'=>$email,
                ],[
                    'nome_diri'=>$nome,
                    'ente'=>$ente,
                    'matr'=>$matr,
                ]);
                //dddx($valutatore);
                $up=[
                    //'nome_diri'=>$nome,

                    'email'=>$email,

                    'valutatore_id'=>$valutatore->id,
                ];
                $valutatore->update($up);
            }


            $valutatore_id=$valutatore->id;

            $cond=CondizioniLavoro::updateOrCreate(
                [
                'anno'=>$anno,
                'quadrimestre'=>$quadrimestre,
                'matr'=>$row['matricola'],
                ],[
                    'valutatore_id'=>$valutatore_id,
                ]);

            //dddx($cond);
            


        }
    }
}
