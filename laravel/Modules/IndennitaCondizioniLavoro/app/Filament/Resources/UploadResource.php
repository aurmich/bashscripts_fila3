<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\UploadResource\Pages;
use Modules\IndennitaCondizioniLavoro\Models\Upload;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UploadResource extends XotBaseResource
{
    // use ContextualResource;
    protected static ?string $model = Upload::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        $dir = 'indennitaCondizioniLavoro/'.auth()->id();

        // $dir='indennitaCondizioniLavoro';
        return [
            FileUpload::make('path')
                ->preserveFilenames()
                ->acceptedFileTypes(['application/pdf'])
            // ->disk('cache')
                ->directory($dir)
                ->openable()
            // ->downloadable()
                ->moveFiles(),
            Select::make('quadrimestre')->options(['1' => '1', '2' => '2', '3' => '3', '4' => '4'])->required(),
            Select::make('anno')->options(['2023' => '2023'])->required(),
            TextInput::make('note'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('path'),
                TextColumn::make('quadrimestre'),
                TextColumn::make('anno'),
                TextColumn::make('note'),
                // TextColumn::make('user_id'),
                TextColumn::make('updated_at'),
                TextColumn::make('created_at'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUploads::route('/'),
            'create' => Pages\CreateUpload::route('/create'),
            'view' => Pages\ViewUpload::route('/{record}'),
            'edit' => Pages\EditUpload::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}
