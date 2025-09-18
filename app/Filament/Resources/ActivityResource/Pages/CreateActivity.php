<?php

<<<<<<< HEAD
namespace Modules\Incentivi\Filament\Resources\ActivityResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Incentivi\Filament\Resources\ActivityResource;

class CreateActivity extends CreateRecord
=======
declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Pages;

use Modules\Activity\Filament\Resources\ActivityResource;

class CreateActivity extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
{
    protected static string $resource = ActivityResource::class;
}
