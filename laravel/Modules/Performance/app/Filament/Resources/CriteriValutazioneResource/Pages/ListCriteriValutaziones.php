<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Ptv\Enums\WorkerType;
use Modules\Performance\Filament\Resources\CriteriValutazioneResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;

class ListCriteriValutaziones extends XotBaseListRecords
{
    protected static string $resource = CriteriValutazioneResource::class;

    /**
     * @return array<string, Columns\TextColumn>
     */
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

    /**
     * @return array<string, Filters\SelectFilter>
     */
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

    /**
     * @return array<string, Actions\DeleteBulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }

    /**
     * Get the header actions for the list page.
     *
     * @return array<int, \Filament\Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            CopyFromLastYearAction::make(),
        ];
    }
}
