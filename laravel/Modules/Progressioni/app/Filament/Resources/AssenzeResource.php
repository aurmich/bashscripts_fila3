<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\AssenzeResource\Pages;
use Modules\Progressioni\Filament\Resources\AssenzeResource\RelationManagers;
use Modules\Progressioni\Models\Assenze;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class AssenzeResource extends XotBaseResource
{
    protected static ?string $model = Assenze::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('id')->disabled(),
            TextInput::make('tipo'),
            TextInput::make('codice'),
            TextInput::make('descr'),
            TextInput::make('anno'),
            TextInput::make('umi'),
            TextInput::make('dur'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('tipo'),
                TextColumn::make('codice'),
                TextColumn::make('descr'),
                TextColumn::make('anno'),
                TextColumn::make('umi'),
                TextColumn::make('dur'),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssenzes::route('/'),
            'create' => Pages\CreateAssenze::route('/create'),
            'edit' => Pages\EditAssenze::route('/{record}/edit'),
        ];
    }
}
