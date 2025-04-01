<?php

namespace Modules\Performance\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Filament\Resources\CriteriValutazioneResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCriteriValutaziones extends XotBaseListRecords
{
    protected static string $resource = CriteriValutazioneResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id_padre' => Columns\TextColumn::make('id_padre')
                ->numeric()
                ->sortable(),
            'nome' => Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            'label' => Columns\TextColumn::make('label')
                ->searchable()
                ->sortable(),
            'descr' => Columns\TextColumn::make('descr')
                ->searchable(),
            'post_type' => Columns\TextColumn::make('post_type')
                ->searchable()
                ->sortable(),
            'posizione' => Columns\TextColumn::make('posizione')
                ->numeric()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'anno' => Filters\SelectFilter::make('anno')
                ->options(function () {
                    $currentYear = (int) date('Y');

                    return [
                        $currentYear => $currentYear,
                        $currentYear - 1 => $currentYear - 1,
                        $currentYear - 2 => $currentYear - 2,
                    ];
                }),
            'post_type' => Filters\SelectFilter::make('post_type')
                ->options(WorkerType::class),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => Actions\EditAction::make(),
            'delete' => Actions\DeleteAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }
}
