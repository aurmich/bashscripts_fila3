<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\CategoriaProproResource\Pages;
use Modules\Progressioni\Models\CategoriaPropro;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CategoriaProproResource extends XotBaseResource
{
    protected static ?string $model = CategoriaPropro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('id')->disabled(),
            TextInput::make('categoria'),
            TextInput::make('lista_propro'),
            TextInput::make('lista_propro_sup'),
            TextInput::make('posti'),
            TextInput::make('anno'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('categoria'),
                TextColumn::make('lista_propro'),
                TextColumn::make('lista_propro_sup'),
                TextColumn::make('posti'),
                TextColumn::make('anno'),
            ])
            ->filters([
                app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            ], layout: FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoriaPropros::route('/'),
            'create' => Pages\CreateCategoriaPropro::route('/create'),
            'edit' => Pages\EditCategoriaPropro::route('/{record}/edit'),
        ];
    }
}
