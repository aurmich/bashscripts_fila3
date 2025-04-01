<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\EsclusiExtraResource\Pages;
use Modules\Progressioni\Filament\Resources\EsclusiExtraResource\RelationManagers;
use Modules\Progressioni\Models\EsclusiExtra;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class EsclusiExtraResource extends XotBaseResource
{
    protected static ?string $model = EsclusiExtra::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'ente' => Forms\Components\TextInput::make('ente')
                ->required()
                ->maxLength(50),
            'matr' => Forms\Components\TextInput::make('matr')
                ->required()
                ->numeric(),
            'cognome' => Forms\Components\TextInput::make('cognome')
                ->required()
                ->maxLength(50),
            'nome' => Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(50),
            'motivo' => Forms\Components\TextInput::make('motivo')
                ->required()
                ->maxLength(255),
            'anno' => Forms\Components\TextInput::make('anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('ente'),
                TextColumn::make('matr'),
                TextColumn::make('cognome'),
                TextColumn::make('nome'),
                TextColumn::make('motivo'),
                TextColumn::make('anno'),
            ])
            ->filters([
                app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                    ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
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

    /**
     * @return array<RelationManagers>
     */
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEsclusiExtras::route('/'),
            'create' => Pages\CreateEsclusiExtra::route('/create'),
            'edit' => Pages\EditEsclusiExtra::route('/{record}/edit'),
        ];
    }
}
