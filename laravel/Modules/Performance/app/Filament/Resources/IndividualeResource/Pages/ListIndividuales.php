<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualeResource\Pages;

use Filament\Tables;
use Filament\Actions;
use function Safe\date;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Performance\Enums\WorkerType;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Performance\Models\Individuale;
use Modules\Performance\Models\Organizzativa;
use Modules\Performance\Actions\ShowMailSendedAt;
use Modules\Ptv\Filament\Columns\LavoratoreColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Performance\Filament\Resources\IndividualeResource;

use Modules\Performance\Filament\Actions\Bulk\SendMailBulkAction;
use Modules\Ptv\Filament\Resources\ReportResource\Widgets\FirmaStabiReparWidget;
use Modules\Ptv\Filament\Columns\QualificaColumn;
use Modules\Ptv\Filament\Columns\RepartoColumn;
use Modules\Ptv\Filament\Columns\PeriodoColumn;

/**
 * ---.
 */
class ListIndividuales extends XotBaseListRecords
{
    protected static string $resource = IndividualeResource::class;

    /** @var array<string, mixed> */
    protected array $data = [];

    public function getModelLabel(): string
    {
        return static::trans('navigation.name');
    }

    public function getPluralModelLabel(): string
    {
        return static::trans('navigation.plural');
    }

    /**
     * @return array<string, TextColumn|ToggleColumn>
     */
    public function getListTableColumnsOLD(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->wrap()
                ->searchable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->sortable()
                ->searchable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->sortable()
                ->searchable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->sortable()
                ->searchable(),
            'email' => Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->sortable()
                ->searchable(),
            'repar' => Tables\Columns\TextColumn::make('repar')
                ->sortable()
                ->searchable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->sortable()
                ->searchable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * @return array<string, Actions\CreateAction|\Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction|\Modules\Ptv\Filament\Actions\Header\PopulateYearAction|ExportXlsAction|Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            \Modules\Ptv\Filament\Actions\Header\PopulateYearAction::make(),
            ExportXlsAction::make(),
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
                        if ($up->count() != 1) {
                            dddx('noo');
                        }
                        $up->first()?->update($data);
                    }
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                }
            ),
        ];
    }

    /**
     * @return array<string, TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            ToggleColumn::make('ha_diritto')->searchable(),
            TextColumn::make('motivo')->searchable(),
            TextColumn::make('mail_sended_at')
                ->html()
                ->default(fn (Individuale $record) => app(ShowMailSendedAt::class)->execute($record)),
            LavoratoreColumn::make('lavoratore')->appendColumns([
                'totale_punteggio' => TextColumn::make('totale_punteggio'),
                'propro' => TextColumn::make('propro'),
            ]),
            QualificaColumn::make('qua'),
            RepartoColumn::make('rep'),
            PeriodoColumn::make('periodo'),
        ];
    }

    /**
     * @return array<string, SelectFilter>
     */
    public function getTableFilters(): array
    {
        return [
            /*
            'anno' => SelectFilter::make('anno')
                ->options(Arr::pluck(Individuale::select('anno')->distinct()->get(), 'anno', 'anno')),
            'stabi' => SelectFilter::make('stabi')
                ->options(Arr::pluck(Organizzativa::select('stabi')->distinct()->get(), 'stabi', 'stabi')),
            'repar' => SelectFilter::make('repar')
                ->options(Arr::pluck(Organizzativa::select('repar')->distinct()->get(), 'repar', 'repar')),
            'ha_diritto' => SelectFilter::make('ha_diritto')
                ->options([
                    '1' => 'Sì',
                    '0' => 'No',
                ]),
                */
        ];
    }

   

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
            FirmaStabiReparWidget::make(['resource' => static::$resource, 'filters' => $filters]),
        ];
    }
}
