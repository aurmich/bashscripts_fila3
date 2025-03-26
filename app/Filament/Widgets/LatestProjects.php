<?php

namespace Modules\Incentivi\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Incentivi\Models\Project;

class LatestProjects extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Ultimi Progetti';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(ProjectResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data di creazione')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stato')
                    ->badge(),
            ])
            ->actions([
                Tables\Actions\Action::make('Apri')
                    ->url(fn (Project $record): string => ProjectResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
