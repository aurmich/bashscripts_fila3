<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\CoeffResource\Pages;
use Modules\Progressioni\Filament\Resources\CoeffResource\RelationManagers;
use Modules\Progressioni\Models\Coeff;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CoeffResource extends XotBaseResource
{
    protected static ?string $model = Coeff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('id')->disabled(),
            TextInput::make('name'),
            TextInput::make('value'),
            TextInput::make('anno'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('value'),
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
     * Undocumented function.
     *
     * @return array<RelationManagers>
     */
    public static function getRelations(): array
    {
        return [
            // RelationManagers
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoeffs::route('/'),
            'create' => Pages\CreateCoeff::route('/create'),
            'edit' => Pages\EditCoeff::route('/{record}/edit'),
        ];
    }
}
