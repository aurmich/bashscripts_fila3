<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\ValutatoreResource\Pages;
use Modules\Progressioni\Filament\Resources\ValutatoreResource\RelationManagers;
use Modules\Progressioni\Models\Valutatore;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class ValutatoreResource extends XotBaseResource {
    protected static ?string $model = Valutatore::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
{
    return [
                TextInput::make('id')->disabled(),
                TextInput::make('stabi'),
                TextInput::make('repar'),
                TextInput::make('nome_stabi'),
                TextInput::make('stabi_txt'),
                TextInput::make('repar_txt'),
                TextInput::make('ente'),
                TextInput::make('matr'),
                TextInput::make('anno'),
                TextInput::make('nome_diri'),
                TextInput::make('nome_diri_plus'),
                TextInput::make('budget'),
                TextInput::make('valutatore_id'),
            ];
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('stabi'),
                TextColumn::make('repar'),
                TextColumn::make('nome_stabi'),
                TextColumn::make('stabi_txt'),
                TextColumn::make('repar_txt'),
                TextColumn::make('ente'),
                TextColumn::make('matr'),
                TextColumn::make('anno'),
                TextColumn::make('nome_diri'),
                TextColumn::make('nome_diri_plus'),
                TextColumn::make('budget'),
                TextColumn::make('valutatore_id'),
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
            'index' => Pages\ListValutatores::route('/'),
            'create' => Pages\CreateValutatore::route('/create'),
            'edit' => Pages\EditValutatore::route('/{record}/edit'),
        ];
    }
}
