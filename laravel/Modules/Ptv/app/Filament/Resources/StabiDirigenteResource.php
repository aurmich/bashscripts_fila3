<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\Ptv\Models\StabiDirigente;
use Modules\Xot\Filament\Resources\XotBaseResource;

class StabiDirigenteResource extends XotBaseResource
{
    protected static ?string $model = StabiDirigente::class;

    

    public static function getFormSchema(): array
    {
        return [
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'valutatore_id' => Forms\Components\TextInput::make('valutatore_id'),
            'stabi' => Forms\Components\TextInput::make('stabi'),
            'repar' => Forms\Components\TextInput::make('repar'),
            'nome_stabi' => Forms\Components\TextInput::make('nome_stabi'),
            // 'ente' => Forms\Components\TextInput::make('ente'),
            'matr' => Forms\Components\TextInput::make('matr'),
            'nome_diri' => Forms\Components\TextInput::make('nome_diri'),
            'nome_diri_plus' => Forms\Components\TextInput::make('nome_diri_plus'),
            'email' => Forms\Components\TextInput::make('email'),
            'anno' => Forms\Components\TextInput::make('anno'),
        ];
    }
    /*
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('valutatore_id'),
                TextColumn::make('stabi')->searchable(),
                TextColumn::make('repar')->searchable(),
                TextColumn::make('nome_stabi')->searchable(),
                // Tables\Columns\TextColumn::make('ente')->searchable(),
                // Tables\Columns\TextColumn::make('matr')->searchable(),
                TextColumn::make('nome_diri')->searchable(),
                TextColumn::make('nome_diri_plus')->searchable(),
                TextColumn::make('anno'),
            ])
            ->filters([
                SelectFilter::make('anno')
                    ->options([
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                    ])->query(static function (Builder $query, array $data): Builder {
                        if (null == $data['value']) {
                            return $query->where('id', 0);
                        }

                        return $query->where('anno', $data['value']);
                    }),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
    */

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStabiDirigentes::route('/'),
            'create' => Pages\CreateStabiDirigente::route('/create'),
            'edit' => Pages\EditStabiDirigente::route('/{record}/edit'),
        ];
    }
}
