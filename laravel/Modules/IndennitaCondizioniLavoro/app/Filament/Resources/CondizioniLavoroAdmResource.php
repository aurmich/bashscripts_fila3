<?php

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoroAdm;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroAdmResource\Pages;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroAdmResource\RelationManagers;

class CondizioniLavoroAdmResource extends XotBaseResource
{
    protected static ?string $model = CondizioniLavoroAdm::class;

    
    

    public static function getFormSchema(): array
    {
        return [
            
        ];
    }

    
}
