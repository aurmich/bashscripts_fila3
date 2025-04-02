<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Arr;
use Modules\Performance\Filament\Resources\OrganizzativaResource;
use Modules\Performance\Models\Organizzativa;
use Modules\Ptv\Filament\Columns\LavoratoreColumn;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * ---.
 */
class ListOrganizzativas extends XotBaseListRecords
{
    protected static string $resource = OrganizzativaResource::class;

    /**
     * @return array<string, TextColumn|LavoratoreColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->sortable(),
            'lavoratore' => LavoratoreColumn::make('lavoratore'),
            'stabi' => TextColumn::make('stabi')
                ->sortable()
                ->searchable(),
            'repar' => TextColumn::make('repar')
                ->sortable()
                ->searchable(),
            'anno' => TextColumn::make('anno')
                ->sortable()
                ->searchable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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

    /**
     * @return array<string, SelectFilter>
     */
    public function getTableFilters(): array
    {
        return [
            /*
            'anno' => SelectFilter::make('anno')
                ->options(Arr::pluck(Organizzativa::select('anno')->distinct()->get(), 'anno', 'anno')),
            'stabi' => SelectFilter::make('stabi')
                ->options(Arr::pluck(Organizzativa::select('stabi')->distinct()->get(), 'stabi', 'stabi')),
            'repar' => SelectFilter::make('repar')
                ->options(Arr::pluck(Organizzativa::select('repar')->distinct()->get(), 'repar', 'repar')),
            */
        ];
    }
}
