<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualePoResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Arr;
use Modules\Performance\Filament\Resources\IndividualePoResource;
use Modules\Performance\Models\IndividualePo;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

use function Safe\date;

/**
 * ---.
 */
class ListIndividualePos extends XotBaseListRecords
{
    protected static string $resource = IndividualePoResource::class;

    /**
     * @return array<string, TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
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
     * @return array<string, Actions\CreateAction>
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /**
     * @return array<string, SelectFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'anno' => SelectFilter::make('anno')
                ->options(Arr::pluck(IndividualePo::select('anno')->distinct()->get(), 'anno', 'anno')),
            'stabi' => SelectFilter::make('stabi')
                ->options(Arr::pluck(IndividualePo::select('stabi')->distinct()->get(), 'stabi', 'stabi')),
            'repar' => SelectFilter::make('repar')
                ->options(Arr::pluck(IndividualePo::select('repar')->distinct()->get(), 'repar', 'repar')),
        ];
    }

    /**
     * @return array<string, Actions\DeleteBulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            Actions\DeleteBulkAction::make(),
        ];
    }
}
