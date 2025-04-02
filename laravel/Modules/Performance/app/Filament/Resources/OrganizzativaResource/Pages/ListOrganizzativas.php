<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;

use Filament\Tables;
use Filament\Actions;
use function Safe\date;
use Illuminate\Support\Arr;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Modules\Ptv\Enums\WorkerType;
use Filament\Tables\Filters\TernaryFilter;
use Modules\Performance\Models\Organizzativa;
use Modules\Ptv\Filament\Columns\PeriodoColumn;
use Modules\Ptv\Filament\Columns\RepartoColumn;
use Modules\Ptv\Filament\Columns\QualificaColumn;
use Modules\Ptv\Filament\Columns\LavoratoreColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Actions\Filament\Filter\GetYearFilter;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;

use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Performance\Filament\Resources\OrganizzativaResource;
use Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;
/**
 * ---.
 */
class ListOrganizzativas extends XotBaseListRecords
{
    protected static string $resource = OrganizzativaResource::class;

    public function getListTableColumns(): array
    {
        return [
            'type' => Tables\Columns\TextColumn::make('type')
                ->searchable(),
                
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->searchable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->searchable(),
               
            LavoratoreColumn::make('lavoratore'),
            'info_group' => GroupColumn::make('info')->schema([
                'perc_parttimepond_dalal' => Tables\Columns\TextColumn::make('perc_parttimepond_dalal'),
                'gg_presenza_dalal' => Tables\Columns\TextColumn::make('gg_presenza_dalal'),
                'gg_assenza_dalal' => Tables\Columns\TextColumn::make('gg_assenza_dalal'),
                'hh_assenza_dalal' => Tables\Columns\TextColumn::make('hh_assenza_dalal'),
                'quota_teorica' => Tables\Columns\TextColumn::make('quota_teorica'),
                'budget_assegnato' => Tables\Columns\TextColumn::make('budget_assegnato'),
                'quota_effettiva' => Tables\Columns\TextColumn::make('quota_effettiva'),
                'resti' => Tables\Columns\TextColumn::make('resti'),
                'resti_pond' => Tables\Columns\TextColumn::make('resti_pond'),
                'importo_totale' => Tables\Columns\TextColumn::make('importo_totale'),
            ]),
            
            QualificaColumn::make('qualifica'),
            RepartoColumn::make('reparto'),
            PeriodoColumn::make('periodo'),
        ];
    }

    public  function getTableFilters(): array
    {
        return [
            'anno' => app(GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            'ha_diritto' => TernaryFilter::make('ha_diritto'),
            'type' => SelectFilter::make('type')
                ->options(WorkerType::class),
        ];
    }


  

    /**
     * @return array<string, Actions\CreateAction>
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            \Modules\Ptv\Filament\Actions\Header\PopulateYearAction::make(),
            \Modules\Ptv\Filament\Actions\Header\TrovaEsclusiAction::make(),
            ExportXlsAction::make(),
        ];
    }

   
}
