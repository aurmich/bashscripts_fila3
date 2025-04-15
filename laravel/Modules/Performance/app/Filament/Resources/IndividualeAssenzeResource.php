<?php

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Modules\Performance\Filament\Resources\IndividualeAssenzeResource\Pages;
use Modules\Performance\Models\IndividualeAssenze;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class IndividualeAssenzeResource extends XotBaseResource
{
    protected static ?string $model = IndividualeAssenze::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'tipo' => Forms\Components\TextInput::make('tipo')
                ->numeric(),
            'codice' => Forms\Components\TextInput::make('codice')
                ->numeric(),
            'descr' => Forms\Components\Textarea::make('descr')
                ->columnSpanFull(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric()
                ->default(date('Y')),
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->maxLength(255)
                ->disabled()
                ->dehydrated(false)
                ->hiddenOn('create'),
            'updated_by' => Forms\Components\TextInput::make('updated_by')
                ->maxLength(255)
                ->disabled()
                ->dehydrated(false),
            'deleted_by' => Forms\Components\TextInput::make('deleted_by')
                ->maxLength(255)
                ->disabled()
                ->dehydrated(false),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividualeAssenzes::route('/'),
            'create' => Pages\CreateIndividualeAssenze::route('/create'),
            'edit' => Pages\EditIndividualeAssenze::route('/{record}/edit'),
        ];
    }
}
