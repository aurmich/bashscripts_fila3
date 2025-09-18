<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;

use Filament\Pages\Actions;
use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource;
use Modules\Ptv\Filament\Resources\MessageResource\Pages\EditMessage as PtvEditMessage;

class EditMessage extends PtvEditMessage
{
    protected static string $resource = MessageResource::class;

    protected function getActions(): array
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Progressioni\Filament\Resources\MessageResource;
<<<<<<< HEAD
=======
namespace Modules\Ptv\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Ptv\Filament\Resources\MessageResource;
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

class EditMessage extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = MessageResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
    protected function getHeaderActions(): array
>>>>>>> bcab6efe (first)
=======
    protected function getActions(): array
>>>>>>> dc18abbe (first)
=======
    protected function getHeaderActions(): array
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
