<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Modules\Rating\Filament\Resources\RatingMorphResource;

class EditRatingMorph extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
<<<<<<< HEAD
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\IndennitaResponsabilita\Filament\Resources\RatingMorphResource;

class EditRatingMorph extends XotBaseEditRecord
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
{
    protected static string $resource = RatingMorphResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
