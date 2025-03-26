<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListStabiDirigentes extends XotBaseListRecords
{
    protected static string $resource = StabiDirigenteResource::class;

   

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('valutatore_id'),
            TextColumn::make('stabi')->searchable(),
            TextColumn::make('repar')->searchable(),
            TextColumn::make('nome_stabi')->searchable(),
            // Tables\Columns\TextColumn::make('ente')->searchable(),
            // Tables\Columns\TextColumn::make('matr')->searchable(),
            TextColumn::make('matr')->searchable(),
            TextColumn::make('nome_diri')->searchable(),
            TextColumn::make('nome_diri_plus')->searchable(),
            TextColumn::make('email')->searchable(),
            TextColumn::make('anno'),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno')
                ->options([
                    '2021' => '2021',
                    '2022' => '2022',
                    '2023' => '2023',
                    '2024' => '2024',
                    '2025' => '2025',
                ])->query(static function (Builder $query, array $data): Builder {
                    if (null == $data['value']) {
                        return $query->where('id', 0);
                    }

                    return $query->where('anno', $data['value']);
                }),
        ];
    }

   

    
   
}
