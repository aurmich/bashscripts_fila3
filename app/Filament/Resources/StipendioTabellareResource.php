<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\StipendioTabellareResource\Pages;
use Modules\Progressioni\Filament\Resources\StipendioTabellareResource\RelationManagers;
use Modules\Progressioni\Models\StipendioTabellare;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class StipendioTabellareResource extends XotBaseResource {
    protected static ?string $model = StipendioTabellare::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
{
    return [
                TextInput::make('id')->disabled(),
                TextInput::make('categoria'),
                TextInput::make('propro'),
                TextInput::make('posfun'),
                TextInput::make('euro_pond'),
                TextInput::make('ptime'),
                TextInput::make('euro'),
                TextInput::make('importo_stipendio_annuo'),
                TextInput::make('anno'),
            ];
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('categoria'),
                TextColumn::make('propro'),
                TextColumn::make('posfun'),
                TextColumn::make('euro_pond'),
                TextColumn::make('ptime'),
                TextColumn::make('euro'),
                TextColumn::make('importo_stipendio_annuo'),
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
    public static function getRelations(): array {
        return [
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListStipendioTabellares::route('/'),
            'create' => Pages\CreateStipendioTabellare::route('/create'),
            'edit' => Pages\EditStipendioTabellare::route('/{record}/edit'),
        ];
    }
}
