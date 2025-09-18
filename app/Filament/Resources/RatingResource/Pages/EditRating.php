<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
namespace Modules\Rating\Filament\Resources\RatingResource\Pages;

use Filament\Pages\Actions;
use Modules\Rating\Filament\Resources\RatingResource;

class EditRating extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
<<<<<<< HEAD
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources\RatingResource\Pages;

use Filament\Pages\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\IndennitaResponsabilita\Filament\Resources\RatingResource;

class EditRating extends XotBaseEditRecord
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
{
    protected static string $resource = RatingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
