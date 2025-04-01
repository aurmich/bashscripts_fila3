<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\CriteriPrecedenzaResource\Pages;
use Modules\Progressioni\Filament\Resources\CriteriPrecedenzaResource\RelationManagers;
use Modules\Progressioni\Models\CriteriPrecedenza;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriPrecedenzaResource extends XotBaseResource
{
    protected static ?string $model = CriteriPrecedenza::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'name' => Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(50),
            'field_name' => Forms\Components\TextInput::make('field_name')
                ->required()
                ->maxLength(50),
            'op' => Forms\Components\TextInput::make('op')
                ->required()
                ->maxLength(50),
            'value' => Forms\Components\TextInput::make('value')
                ->required()
                ->maxLength(50),
            'post_type' => Forms\Components\TextInput::make('post_type')
                ->maxLength(50),
            'posizione' => Forms\Components\TextInput::make('posizione')
                ->numeric()
                ->required(),
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
                TextColumn::make('parent_id'),
                TextColumn::make('name'),
                TextColumn::make('order_direction'),
                TextColumn::make('label'),
                TextColumn::make('descr'),
                TextColumn::make('post_type'),
                TextColumn::make('posizione'),
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
            'index' => Pages\ListCriteriPrecedenzas::route('/'),
            'create' => Pages\CreateCriteriPrecedenza::route('/create'),
            'edit' => Pages\EditCriteriPrecedenza::route('/{record}/edit'),
        ];
    }
}
