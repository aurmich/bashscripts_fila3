<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Modules\Rating\Filament\Resources\RatingMorphResource;

class EditRatingMorph extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\IndennitaResponsabilita\Filament\Resources\RatingMorphResource;

class EditRatingMorph extends XotBaseEditRecord
>>>>>>> e0005d7d (first)
{
    protected static string $resource = RatingMorphResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
