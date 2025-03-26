<?php

namespace Modules\Ptv\Filament\Resources\AnagResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class Qua03fRelationManager extends RelationManager
{
    protected static string $relationship = 'qua03f';
    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            // ->columns(1)
            ->schema([
                TextEntry::make('id'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([

                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('matr'),
                Tables\Columns\TextColumn::make('q3pro'),
                Tables\Columns\TextColumn::make('q3fun'),
                Tables\Columns\TextColumn::make('q3tipo'),
                Tables\Columns\TextColumn::make('q3desc'),
                Tables\Columns\TextColumn::make('q32kd'),
                Tables\Columns\TextColumn::make('q32ka'),

                Tables\Columns\TextColumn::make('_gg')
                    ->default(fn ($record, $livewire) => $record->gg([
                        'date_max' => $livewire->getOwnerRecord()->getDateMax(),
                    ])),
                Tables\Columns\TextColumn::make('_gg_cateco')
                    ->default(function ($record, $livewire): int {
                        $res = $record->gg(
                            [
                                'date_max' => $livewire->getOwnerRecord()->getDateMax(),
                                'lista_propro' => $livewire->getOwnerRecord()->lista_propro,
                                'lista_propro_sup' => $livewire->getOwnerRecord()->lista_propro_sup,
                            ]
                        );

                        return $res;
                    }
                    ),
                Tables\Columns\TextColumn::make('_gg_cateco_posfun')
                    ->default(function ($record, $livewire): int {
                        $res = $record->gg(
                            [
                                'date_max' => $livewire->getOwnerRecord()->getDateMax(),
                                'lista_propro' => $livewire->getOwnerRecord()->lista_propro,
                                'lista_propro_sup' => $livewire->getOwnerRecord()->lista_propro_sup,
                                'posfun' => $livewire->getOwnerRecord()->posfun_val,
                            ]
                        );

                        return $res;
                    }
                    ),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //    Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
