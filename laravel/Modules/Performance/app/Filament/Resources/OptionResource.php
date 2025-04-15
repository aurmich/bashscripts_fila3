<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Ptv\Enums\WorkerType;
use Modules\Performance\Filament\Resources\OptionResource\Pages;
use Modules\Performance\Models\Option;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Ptv\Filament\Resources\OptionResource as PtvOptionResource;
use function Safe\date;

class OptionResource extends PtvOptionResource
{
    protected static ?string $model = Option::class;

   /*

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOption::route('/create'),
            'edit' => Pages\EditOption::route('/{record}/edit'),
        ];
    }
    */
    
}
