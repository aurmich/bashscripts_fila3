<?php

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
namespace Modules\Progressioni\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Progressioni\Filament\Resources\MessageResource;
=======
namespace Modules\Ptv\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Ptv\Filament\Resources\MessageResource;
>>>>>>> dc18abbe (first)

class EditMessage extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = MessageResource::class;

<<<<<<< HEAD
    protected function getHeaderActions(): array
>>>>>>> bcab6efe (first)
=======
    protected function getActions(): array
>>>>>>> dc18abbe (first)
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
