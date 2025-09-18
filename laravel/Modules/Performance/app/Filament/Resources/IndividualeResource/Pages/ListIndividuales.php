<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualeResource\Pages;

use Filament\Tables;
use Filament\Actions;
use function Safe\date;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Ptv\Enums\WorkerType;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Performance\Models\Individuale;
use Modules\Performance\Models\Organizzativa;
use Modules\Ptv\Filament\Columns\PeriodoColumn;
use Modules\Ptv\Filament\Columns\RepartoColumn;
use Modules\Performance\Actions\ShowMailSendedAt;

use Modules\Ptv\Filament\Columns\QualificaColumn;
use Modules\Ptv\Filament\Columns\LavoratoreColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Ptv\Filament\Filters\AnnoValutatoreFilter;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Performance\Filament\Resources\IndividualeResource;
use Modules\Performance\Filament\Actions\Bulk\SendMailBulkAction;
use Modules\Ptv\Filament\Resources\ReportResource\Widgets\FirmaStabiReparWidget;
use Modules\Performance\Filament\Resources\IndividualeResource\Pages\FillOutTheForm;

/**
 * ---.
 */
class ListIndividuales extends XotBaseListRecords
{
    protected static string $resource = IndividualeResource::class;

    /** @var array<string, mixed> */
    protected array $data = [];

   

    public  function getTableActions(): array
    {

        $myclass=(static::class);
        $fill_class=Str::of($myclass)
            ->before('\Pages\\')
            ->append('\Pages\FillOutTheForm')
            ->toString();
        return [
            ...parent::getTableActions(),
            'fill' => Tables\Actions\Action::make('fill')
                ->label('Compila')
                ->icon('heroicon-o-pencil-square')
                ->url(fn ($record) => $fill_class::getUrl(['record' => $record]))
                ->visible(fn ($record) => $record->ha_diritto == 1),
        ];
    }

    /**
     * @return array<string, Actions\CreateAction|\Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction|\Modules\Ptv\Filament\Actions\Header\PopulateYearAction|ExportXlsAction|Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            \Modules\Ptv\Filament\Actions\Header\PopulateYearAction::make(),
            //ExportXlsAction::make(),
            Actions\Action::make('copy_from_organizzativa')->action(
                function () {
                    $tableFilters = [];
                    if (is_array($this->tableFilters)) {
                        $tableFilters = $this->tableFilters;
                    }
                    $anno = Arr::get($tableFilters, 'anno.value');
                    if ($anno < 2023) {
                        dddx('non si puo');
                    }
                    $rows = Organizzativa::where('anno', $anno)->get();
                    foreach ($rows as $row) {
                        $data = $row->toArray();
                        $where = Arr::only($data, ['ente', 'matr', 'dal', 'al']);
                        $up = Individuale::where($where)->get();
                        if ($up->count() > 1) {
                            dddx('noo');
                        }
                        if ($up->count() == 0) {
                            $up = Individuale::create($data);
                        }
                        if ($up->count() == 1) {
                            $up->first()?->update($data);
                        }
                    }
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                }
            )->visible(fn ($livewire): bool => $livewire->getResource()::can('create')),
        ];
    }

    /**
     * @return array<string, TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            //ToggleColumn::make('ha_diritto')->searchable(),
            IconColumn::make('ha_diritto')->boolean(),
            TextColumn::make('motivo')->searchable(),
            TextColumn::make('mail_sended_at')
                ->html()
                ->default(fn (Individuale $record) => app(ShowMailSendedAt::class)->execute($record)),
            LavoratoreColumn::make('lavoratore')->appendColumns([
                'totale_punteggio' => TextColumn::make('totale_punteggio'),
                'propro' => TextColumn::make('propro'),
            ]),
            QualificaColumn::make('qualifica'),
            RepartoColumn::make('reparto'),
            PeriodoColumn::make('periodo'),
        ];
    }

    /**
     * @return array<string, SelectFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'anno_valutatore' => AnnoValutatoreFilter::make('anno_valutatore'),
            /*
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y')))
                ->default(intval(date('Y'))-1),
            */
        ];
    }

    /*
    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();
        
        $tableFilters = $this->tableFilters ?? [];
        $anno = Arr::get($tableFilters, 'anno.value');
        
        if (empty($anno)) {
            return $query->whereRaw('1 = 0'); // Non mostra nessun record se non è selezionato l'anno
        }
        
        return $query->where('anno', $anno);
    }
    */

    /**
     * @return array<string, SendMailBulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            SendMailBulkAction::make('send_mail'),
        ];
    }

    /**
     * @return array<string, FirmaStabiReparWidget>
     */
    public function getHeaderWidgets(): array
    {
        $filters = Arr::get($this->tableFilters ?? [], 'stabi_repar_anno');

        return [
        //    FirmaStabiReparWidget::make(['resource' => static::$resource, 'filters' => $filters]),
        ];
    }
}
