<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SplitColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Arr;
use Modules\Performance\Filament\Resources\OrganizzativaResource;
use Modules\Performance\Models\Organizzativa;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

use function Safe\date;

/**
 * ---.
 */
class ListOrganizzativas extends XotBaseListRecords
{
    protected static string $resource = OrganizzativaResource::class;

    /**
     * @return array<string, TextColumn|SplitColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->sortable()
                ->searchable()
                ->description(fn (Organizzativa $record): string => 
                    "{$record->nome} - {$record->matr} - {$record->email}"
                ),
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
            'anno' => SelectFilter::make('anno')
                ->options(Arr::pluck(Organizzativa::select('anno')->distinct()->get(), 'anno', 'anno')),
            'stabi' => SelectFilter::make('stabi')
                ->options(Arr::pluck(Organizzativa::select('stabi')->distinct()->get(), 'stabi', 'stabi')),
            'repar' => SelectFilter::make('repar')
                ->options(Arr::pluck(Organizzativa::select('repar')->distinct()->get(), 'repar', 'repar')),
        ];
    }
}
