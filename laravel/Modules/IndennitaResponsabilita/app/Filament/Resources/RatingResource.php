<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Modules\IndennitaResponsabilita\Filament\Resources\RatingResource\Pages;
use Modules\IndennitaResponsabilita\Models\Rating;
use Modules\Rating\Filament\Resources\RatingResource as BaseRatingResource;

class RatingResource extends BaseRatingResource
{
    protected static ?string $model = Rating::class;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }
}
