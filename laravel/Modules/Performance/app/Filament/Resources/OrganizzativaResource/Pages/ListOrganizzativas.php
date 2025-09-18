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
use Modules\Performance\Enums\WorkerType;
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
                /*
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            'email' => Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                */
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->searchable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->searchable(),
                /*
            'lavoratore_group' => GroupColumn::make('lavoratore')->schema([
                'matr' => Tables\Columns\TextColumn::make('matr')->searchable(),
                'cognome' => Tables\Columns\TextColumn::make('cognome')->searchable(),
                'nome' => Tables\Columns\TextColumn::make('nome'),
                'email' => Tables\Columns\TextColumn::make('email'),
            ]),
            */
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
            /*
            'qua_group' => GroupColumn::make('qua')->schema([
                'propro' => Tables\Columns\TextColumn::make('propro'),
                'posfun' => Tables\Columns\TextColumn::make('posfun'),
                'categoria_eco' => Tables\Columns\TextColumn::make('categoria_eco'),
                'posiz' => Tables\Columns\TextColumn::make('posiz'),
                'posiz_txt' => Tables\Columns\TextColumn::make('posiz_txt'),
                'disci1' => Tables\Columns\TextColumn::make('disci1'),
                'disci1_txt' => Tables\Columns\TextColumn::make('disci1_txt'),
            ]),
            'rep_group' => GroupColumn::make('rep')->schema([
                'stabi' => Tables\Columns\TextColumn::make('stabi'),
                'stabi_txt' => Tables\Columns\TextColumn::make('stabi_txt'),
                'repar' => Tables\Columns\TextColumn::make('repar'),
                'repar_txt' => Tables\Columns\TextColumn::make('repar_txt'),
            ]),
            'periodo_group' => GroupColumn::make('periodo')->schema([
                'dal' => Tables\Columns\TextColumn::make('dal'),
                'al' => Tables\Columns\TextColumn::make('al'),
                'anno' => Tables\Columns\TextColumn::make('anno'),
            ]),
            */
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

    public  function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make()
                ->label('')
                ->tooltip('Modifica'),
            'view' => Tables\Actions\ViewAction::make()
                ->label('')
                ->tooltip('Vedi'),
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
            ExportXlsAction::make(),
        ];
    }

   
}
