<?php

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\PesiResource\Pages;
use Modules\Progressioni\Filament\Resources\PesiResource\RelationManagers;
use Modules\Progressioni\Models\Pesi;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class PesiResource extends XotBaseResource
{
    protected static ?string $model = Pesi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'lista_propro' => Forms\Components\TextInput::make('lista_propro')
                ->required()
                ->maxLength(50),
            'descr' => Forms\Components\TextInput::make('descr')
                ->required()
                ->maxLength(255),
            'peso_esperienza_acquisita' => Forms\Components\TextInput::make('peso_esperienza_acquisita')
                ->required()
                ->numeric(),
            'peso_risultati_ottenuti' => Forms\Components\TextInput::make('peso_risultati_ottenuti')
                ->required()
                ->numeric(),
            'peso_arricchimento_professionale' => Forms\Components\TextInput::make('peso_arricchimento_professionale')
                ->required()
                ->numeric(),
            'peso_impegno' => Forms\Components\TextInput::make('peso_impegno')
                ->required()
                ->numeric(),
            'peso_qualita_prestazione' => Forms\Components\TextInput::make('peso_qualita_prestazione')
                ->required()
                ->numeric(),
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
                TextColumn::make('lista_propro'),
                TextColumn::make('descr'),
                TextColumn::make('peso_esperienza_acquisita'),
                TextColumn::make('peso_risultati_ottenuti'),
                TextColumn::make('peso_arricchimento_professionale'),
                TextColumn::make('peso_impegno'),
                TextColumn::make('peso_qualita_prestazione'),
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

    /**
     * @return array<RelationManagers>
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesis::route('/'),
            'create' => Pages\CreatePesi::route('/create'),
            'edit' => Pages\EditPesi::route('/{record}/edit'),
        ];
    }
}
