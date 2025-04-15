<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources;

use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\IndennitaCondizioniLavoro\Models\IndennitaTipo;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource\Pages\EditIndennitaTipo;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource\Pages\ListIndennitaTipos;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource\Pages\CreateIndennitaTipo;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource\RelationManagers\DettaglioRelationManager;

class IndennitaTipoResource extends XotBaseResource
{
    protected static ?string $model = IndennitaTipo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Admin';

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('nome'),
            TextInput::make('svocfi'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable(),
                TextColumn::make('nome')->searchable(),
                TextColumn::make('svocfi')->searchable(),
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            DettaglioRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIndennitaTipos::route('/'),
            'create' => CreateIndennitaTipo::route('/create'),
            'edit' => EditIndennitaTipo::route('/{record}/edit'),
        ];
    }
}
