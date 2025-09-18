<?php

namespace Modules\Ptv\Filament\Resources\AnagResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AszEffRelationManager extends RelationManager
{
    protected static string $relationship = 'aszEff';
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
                Tables\Columns\TextColumn::make('tip-cod')
                    ->default(fn ($record) => $record->asztip.'-'.$record->aszcod),
                /*
                    Components\Group::make()->schema([
                        Components\TextEntry::make('asztip'),
                        Components\TextEntry::make('aszcod'),
                    ]),
                    */
                Tables\Columns\TextColumn::make('ini-fin')
                    ->default(fn ($record) => $record->aszini.'-'.$record->aszfin),
                /*
                    Components\Group::make()->schema([
                        Components\TextEntry::make('aszini'),
                        Components\TextEntry::make('aszfin'),
                    ]),
                    */
                Tables\Columns\TextColumn::make('asz2kd'),
                Tables\Columns\TextColumn::make('asz2ka'),
                Tables\Columns\TextColumn::make('aszumi'),
                Tables\Columns\TextColumn::make('aszdur'),
                // Components\TextEntry::make('aszann'),
                // Components\TextEntry::make('asz_txt')->,
                // ->columnSpan(2),
                Tables\Columns\TextColumn::make('propro')
                // ->default(fn($record)=>$record->propro)
                ,
                Tables\Columns\TextColumn::make('posfun'),

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
