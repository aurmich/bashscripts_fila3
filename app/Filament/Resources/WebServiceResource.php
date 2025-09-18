<?php

declare(strict_types=1);

namespace Modules\Sigma\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Sigma\Filament\Resources\WebServiceResource\Pages;
use Modules\Sigma\Models\WebService;
use Modules\Xot\Filament\Resources\XotBaseResource;

class WebServiceResource extends XotBaseResource
{
    protected static ?string $model = WebService::class;

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    public static function getFormSchema(): array
{
    return [
                TextInput::make('name'),
            ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
            ])
            ->filters([
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebServices::route('/'),
            'create' => Pages\CreateWebService::route('/create'),
            'edit' => Pages\EditWebService::route('/{record}/edit'),
        ];
    }
}
