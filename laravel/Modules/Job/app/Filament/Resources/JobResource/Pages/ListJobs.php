<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Modules\Job\Filament\Resources\JobResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListJobs extends XotBaseListRecords
{
    protected static string $resource = JobResource::class;

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->searchable()
                ->sortable(),
            TextColumn::make('queue')
                ->searchable()
                ->sortable(),
            TextColumn::make('attempts')
                ->numeric()
                ->sortable(),
            TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'running' => 'primary',
                    'waiting' => 'warning',
                    default => 'danger',
                }),
            TextColumn::make('reserved_at')
                ->dateTime()
                ->sortable(),
            TextColumn::make('available_at')
                ->dateTime()
                ->sortable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            ViewColumn::make('payload')
                ->view('job::filament.tables.columns.array'),
        ];
    }
}
