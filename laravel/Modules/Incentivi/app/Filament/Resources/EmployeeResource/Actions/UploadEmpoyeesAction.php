<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\EmployeeResource\Actions;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Modules\Incentivi\Models\Employee;
use Modules\Sigma\Models\Rep00f;

class UploadEmpoyeesAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('Carica/Aggiorna Dipendenti')
            ->icon('heroicon-o-arrow-up-tray')
            ->form([
                DatePicker::make('giorno')
                    ->native(false)
                    ->default(now()),
            ])
            ->action(
                static function (array $data): void {
                    $date = Carbon::parse($data['giorno'])->format('Ymd');
                    $date = intval($date);
                    $rows = Rep00f::ofDate($date)
                        ->ofEnte(90)
                        ->where('repann', '')
                        ->select('ente', 'matr')
                        ->distinct()
                        ->get();
                    foreach ($rows as $row) {
                        // dddx($row->ana10f()->ddRawSql());
                        $data = [
                            'matricola' => $row->matr,
                            'cognome' => $row->cognome,
                            'nome' => $row->nome,
                            'sesso' => $row->sesso,
                            'codice_fiscale' => $row->codice_fiscale,
                            'posizione_inail' => $row->inail,
                            'tipologia' => 'I',
                        ];
                        $where = ['matricola' => $row->matr];
                        Employee::updateOrCreate($where, $data);
                    }

                    Notification::make()->success()->title('Upload executed successfully.');
                }
            );
    }

    public static function getDefaultName(): ?string
    {
        return 'UploadEmployeesAction';
    }
}
