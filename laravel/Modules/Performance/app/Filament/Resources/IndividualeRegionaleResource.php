<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Modules\Performance\Filament\Resources\IndividualeRegionaleResource\Pages;
use Modules\Performance\Models\IndividualeRegionale;

class IndividualeRegionaleResource extends IndividualeResource
{
    protected static ?string $model = IndividualeRegionale::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndividualeRegionales::route('/'),
            'create' => Pages\CreateIndividualeRegionale::route('/create'),
            'edit' => Pages\EditIndividualeRegionale::route('/{record}/edit'),
            'fill_out_the_form' => Pages\FillOutTheForm::route('/{record}/fill'),
        ];
    }
}
