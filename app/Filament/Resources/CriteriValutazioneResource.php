<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\CriteriValutazioneResource\Pages;
use Modules\Progressioni\Filament\Resources\CriteriValutazioneResource\RelationManagers;
use Modules\Progressioni\Models\CriteriValutazione;
=======
namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Modules\Performance\Filament\Resources\CriteriValutazioneResource\Pages;
use Modules\Performance\Models\CriteriValutazione;
>>>>>>> 961ad402 (first)
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriValutazioneResource extends XotBaseResource
{
    protected static ?string $model = CriteriValutazione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'parent_id' => Forms\Components\TextInput::make('parent_id')
                ->numeric(),
            'name' => Forms\Components\TextInput::make('name')
=======
            'id_padre' => Forms\Components\TextInput::make('id_padre')
                ->required()
                ->numeric()
                ->default(0),
            'nome' => Forms\Components\TextInput::make('nome')
>>>>>>> 961ad402 (first)
                ->required()
                ->maxLength(50),
            'label' => Forms\Components\TextInput::make('label')
                ->required()
<<<<<<< HEAD
                ->maxLength(50),
            'descr' => Forms\Components\TextInput::make('descr')
                ->maxLength(255),
            'post_type' => Forms\Components\TextInput::make('post_type')
                ->maxLength(50),
            'posizione' => Forms\Components\TextInput::make('posizione')
                ->numeric()
                ->required(),
=======
                ->maxLength(255),
            'descr' => Forms\Components\TextInput::make('descr')
                ->maxLength(50),
            'post_type' => Forms\Components\TextInput::make('post_type')
                ->required()
                ->maxLength(50),
            'posizione' => Forms\Components\TextInput::make('posizione')
                ->required()
                ->numeric()
                ->default(0),
>>>>>>> 961ad402 (first)
            'anno' => Forms\Components\TextInput::make('anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
<<<<<<< HEAD
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('parent_id'),
                TextColumn::make('name'),
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
=======
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->maxLength(50)
                ->disabled()
                ->dehydrated(false)
                ->hiddenOn('create'),
>>>>>>> 961ad402 (first)
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriValutaziones::route('/'),
            'create' => Pages\CreateCriteriValutazione::route('/create'),
            'edit' => Pages\EditCriteriValutazione::route('/{record}/edit'),
        ];
    }
}
