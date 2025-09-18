<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\CriteriOptionResource\Pages;
use Modules\Progressioni\Filament\Resources\CriteriOptionResource\RelationManagers;
use Modules\Progressioni\Models\CriteriOption;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriOptionResource extends XotBaseResource
{
    protected static ?string $model = CriteriOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'name' => Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(50),
            'value' => Forms\Components\TextInput::make('value')
                ->required()
                ->maxLength(50),
            'type' => Forms\Components\TextInput::make('type')
                ->maxLength(50),
            'anno' => Forms\Components\TextInput::make('anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
            'note' => Forms\Components\RichEditor::make('note')
                ->columnSpan('full'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('value'),
                TextColumn::make('type'),
                TextColumn::make('note')->html()->wrap(),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriOptions::route('/'),
            'create' => Pages\CreateCriteriOption::route('/create'),
            'edit' => Pages\EditCriteriOption::route('/{record}/edit'),
        ];
    }
}
