<?php

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Modules\Progressioni\Models\MaxCatecoPosfunAnno;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Progressioni\Filament\Resources\MaxCatecoPosfunAnnoResource\Pages;

class MaxCatecoPosfunAnnoResource extends XotBaseResource
{
    protected static ?string $model = MaxCatecoPosfunAnno::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Max Cateco Posfun Anno';
    protected static ?string $pluralModelLabel = 'Max Cateco Posfun Anno';
    protected static ?string $navigationGroup = 'Progressioni';

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('cateco')
                ->required(),
            Forms\Components\TextInput::make('pos_fun')
                ->required(),
            Forms\Components\TextInput::make('anno')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('max_gg_tot_pond')
                ->numeric(),
            Forms\Components\TextInput::make('aventi_diritto')
                ->numeric(),
            Forms\Components\TextInput::make('aventi_diritto_perc')
                ->numeric(),
            Forms\Components\TextInput::make('aventi_diritto_eff')
                ->numeric(),
        ];
    }

   

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('cateco')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pos_fun')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('anno')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_gg_tot_pond')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('aventi_diritto')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('aventi_diritto_perc')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('aventi_diritto_eff')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaxCatecoPosfunAnnos::route('/'),
            'create' => Pages\CreateMaxCatecoPosfunAnno::route('/create'),
            'edit' => Pages\EditMaxCatecoPosfunAnno::route('/{record}/edit'),
        ];
    }
}
