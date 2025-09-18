<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Filament\Resources;

use Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages\CreateStabiDirigente;
use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages\EditStabiDirigente;
use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages\ListStabiDirigentes;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
>>>>>>> e0005d7d (first)
use Modules\Ptv\Filament\Resources\StabiDirigenteResource as PtvStabiDirigenteResource;

class StabiDirigenteResource extends PtvStabiDirigenteResource
{
    protected static ?string $model = StabiDirigente::class;

<<<<<<< HEAD
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStabiDirigentes::route('/'),
            'create' => Pages\CreateStabiDirigente::route('/create'),
            'edit' => Pages\EditStabiDirigente::route('/{record}/edit'),
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStabiDirigentes::route('/'),
            'create' => CreateStabiDirigente::route('/create'),
            'edit' => EditStabiDirigente::route('/{record}/edit'),
>>>>>>> e0005d7d (first)
        ];
    }
}
