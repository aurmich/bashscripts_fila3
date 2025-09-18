<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Filament\Tables\Columns;
use Modules\Rating\Filament\Resources\RatingMorphResource;
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters\SelectFilter;
use Modules\IndennitaResponsabilita\Filament\Resources\RatingMorphResource;
>>>>>>> e0005d7d (first)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRatingMorphs extends XotBaseListRecords
{
    protected static string $resource = RatingMorphResource::class;

<<<<<<< HEAD
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

=======
>>>>>>> e0005d7d (first)
    public function getListTableColumns(): array
    {
        return [
            'id' => Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),
            'rating' => Columns\TextColumn::make('rating')
                ->sortable()
                ->searchable(),
            'ratingable_type' => Columns\TextColumn::make('ratingable_type')
                ->label('Type')
                ->sortable(),
            'ratingable_id' => Columns\TextColumn::make('ratingable_id')
                ->label('ID')
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }
<<<<<<< HEAD
=======

    public function getTableFilters(): array
    {
        return [
            'type' => SelectFilter::make('ratingable_type')
                ->label('Filter by Type')
                ->options([
                    'post' => 'Post',
                    'user' => 'User',
                    'comment' => 'Comment',
                ]),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            'create' => Actions\CreateAction::make(),
        ];
    }
>>>>>>> e0005d7d (first)
}
