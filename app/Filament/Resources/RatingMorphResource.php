<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
namespace Modules\Rating\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Rating\Filament\Resources\RatingMorphResource\Pages;
use Modules\Rating\Models\RatingMorph;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RatingMorphResource extends XotBaseResource
{
    protected static ?string $model = RatingMorph::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            // Campi del form
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRatingMorphs::route('/'),
            'create' => Pages\CreateRatingMorph::route('/create'),
            'edit' => Pages\EditRatingMorph::route('/{record}/edit'),
        ];
    }
<<<<<<< HEAD
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Modules\IndennitaResponsabilita\Models\RatingMorph;
use Modules\Rating\Filament\Resources\RatingMorphResource as BaseRatingMorphResource;

class RatingMorphResource extends BaseRatingMorphResource
{
    protected static ?string $model = RatingMorph::class;
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
}
