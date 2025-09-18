<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Modules\Incentivi\Filament\Resources\WorkgroupResource\Pages;
use Modules\Incentivi\Filament\Resources\WorkgroupResource\RelationManagers\EmployeesRelationManager;
use Modules\Incentivi\Models\Workgroup;
use Modules\Xot\Filament\Resources\XotBaseResource;

class WorkgroupResource extends XotBaseResource
{
    // protected static ?string $model = Workgroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $navigationGroup = 'Incentivi';

    protected static ?int $navigationSort = 1;

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'informazioni' => Forms\Components\Section::make('Informazioni')
                ->schema([
                    Forms\Components\TextInput::make('denominazione')
                        ->required()
                        ->maxLength(255),
                ])->columnSpan(1),
        ];
        // )->columns(3);
    }

    public static function getRelations(): array
    {
        return [
            EmployeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkgroups::route('/'),
            'create' => Pages\CreateWorkgroup::route('/create'),
            'edit' => Pages\EditWorkgroup::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Gruppo di Lavoro');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Gruppi di Lavoro');
    }
}
