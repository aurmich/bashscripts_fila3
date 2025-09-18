<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Ptv\Enums\WorkerType;
use Modules\Ptv\Filament\Resources\OptionResource\Pages;
use Modules\Ptv\Models\Option;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class OptionResource extends XotBaseResource
{
    protected static ?string $model = Option::class;

   

   


   
   
    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('option_type')
                ->maxLength(191),
            Forms\Components\TextInput::make('option_id')
                ->numeric(),
            Forms\Components\TextInput::make('parent_id')
                ->numeric(),
            Forms\Components\TextInput::make('pos')
                ->numeric(),
            Forms\Components\Textarea::make('name')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('value')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('txt')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('txt1')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('year')
                ->numeric(),
        ];
    }
}
