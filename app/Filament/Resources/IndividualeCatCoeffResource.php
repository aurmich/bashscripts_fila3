<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Modules\Performance\Filament\Resources\IndividualeCatCoeffResource\Pages;
use Modules\Performance\Models\IndividualeCatCoeff;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class IndividualeCatCoeffResource extends XotBaseResource
{
    protected static ?string $model = IndividualeCatCoeff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'lista_propro' => Forms\Components\TextInput::make('lista_propro')
                ->maxLength(250),
            'coeff' => Forms\Components\TextInput::make('coeff')
                ->numeric(),
            'descr' => Forms\Components\Textarea::make('descr')
                ->columnSpanFull(),
            'tot_giorni' => Forms\Components\TextInput::make('tot_giorni')
                ->numeric(),
            'tot_giorni_pt' => Forms\Components\TextInput::make('tot_giorni_pt')
                ->numeric(),
            'tot_giorni_pt_coeff' => Forms\Components\TextInput::make('tot_giorni_pt_coeff')
                ->numeric(),
            'quota_teorica' => Forms\Components\TextInput::make('quota_teorica')
                ->numeric(),
            'anno' => Forms\Components\TextInput::make('anno')
                ->numeric()
                ->default(date('Y')),
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->maxLength(50)
                ->disabled()
                ->dehydrated(false)
                ->hiddenOn('create'),
        ];
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividualeCatCoeffs::route('/'),
            'create' => Pages\CreateIndividualeCatCoeff::route('/create'),
            'edit' => Pages\EditIndividualeCatCoeff::route('/{record}/edit'),
        ];
    }
}
