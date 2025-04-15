<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\AnagResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class Qua00fRelationManager extends RelationManager
{
    protected static string $relationship = 'qua00f';
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
                Tables\Columns\TextColumn::make('propro'),
                Tables\Columns\TextColumn::make('posfun'),
                Tables\Columns\TextColumn::make('posiz'),
                Tables\Columns\TextColumn::make('categoria_eco'),
                Tables\Columns\TextColumn::make('qua2kd'),
                Tables\Columns\TextColumn::make('qua2ka'),

                Tables\Columns\TextColumn::make('_gg')
                    ->default(fn ($record, $livewire) => $record->gg([
                        'date_max' => $livewire->getOwnerRecord()->getDateMax(),
                        'no_posiz' => $livewire->getOwnerRecord()->getOption('no_posiz'),
                    ])),
                Tables\Columns\TextColumn::make('_gg_cateco')
                    ->default(function ($record, $livewire): float {
                        $owner_record = $livewire->getOwnerRecord();
                        $res = $record->gg(
                            [
                                'date_max' => $owner_record->getDateMax(),
                                'lista_propro' => $owner_record->lista_propro,
                                'lista_propro_sup' => $owner_record->lista_propro_sup,
                                'no_posiz' => $owner_record->getOption('no_posiz'),
                            ]
                        );

                        return $res;
                    }
                    ),
                Tables\Columns\TextColumn::make('_gg_cateco_posfun')
                    ->default(function ($record, $livewire): float {
                        $owner_record = $livewire->getOwnerRecord();
                        $res = $record->gg(
                            [
                                'date_max' => $owner_record->getDateMax(),
                                'lista_propro' => $owner_record->lista_propro,
                                'lista_propro_sup' => $owner_record->lista_propro_sup,
                                'posfun' => $owner_record->posfun_val,
                                'no_posiz' => $owner_record->getOption('no_posiz'),
                            ]
                        );

                        return $res;
                    }
                    ),
            ])
            ->filters([
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
