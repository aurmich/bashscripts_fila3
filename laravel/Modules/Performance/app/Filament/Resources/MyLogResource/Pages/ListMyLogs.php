<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\MyLogResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\MyLogResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListMyLogs extends XotBaseListRecords
{
    protected static string $resource = MyLogResource::class;

    /**
     * @return array<string, CreateAction>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create_log' => CreateAction::make(),
        ];
    }

    /**
     * @return array<string, Columns\TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => Columns\TextColumn::make('id')
                ->numeric()
                ->sortable(),
            'id_tbl' => Columns\TextColumn::make('id_tbl')
                ->numeric()
                ->sortable(),
            'tbl' => Columns\TextColumn::make('tbl')
                ->searchable()
                ->sortable(),
            'id_approvaz' => Columns\TextColumn::make('id_approvaz')
                ->numeric()
                ->sortable(),
            'note' => Columns\TextColumn::make('note')
                ->searchable()
                ->sortable()
                ->wrap(),
            'data' => Columns\TextColumn::make('data')
                ->searchable()
                ->sortable(),
            'datemod' => Columns\TextColumn::make('datemod')
                ->searchable()
                ->sortable(),
            'handle' => Columns\TextColumn::make('handle')
                ->searchable()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'created_by' => Columns\TextColumn::make('created_by')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_by' => Columns\TextColumn::make('updated_by')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * @return array<string, Filters\SelectFilter|Filters\Filter>
     */
    public function getTableFilters(): array
    {
        return [
            'tbl' => Filters\SelectFilter::make('tbl')
                ->options(function () {
                    return [
                        'individuales' => 'Individuali',
                        'individuale_pos' => 'Individuali PO',
                        'individuale_regionales' => 'Individuali Regionali',
                        'individuale_adms' => 'Individuali ADM',
                    ];
                }),
            'note' => Filters\Filter::make('note')
                ->form([
                    \Filament\Forms\Components\TextInput::make('value')
                        ->placeholder('Inserisci la nota da cercare'),
                ])
                ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data): \Illuminate\Database\Eloquent\Builder {
                    return $query->when(
                        $data['value'] ?? null,
                        fn (\Illuminate\Database\Eloquent\Builder $query, $value): \Illuminate\Database\Eloquent\Builder => $query->where('note', 'like', "%{$value}%")
                    );
                }),
        ];
    }

    /**
     * @return array<string, Actions\DeleteBulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }
}
