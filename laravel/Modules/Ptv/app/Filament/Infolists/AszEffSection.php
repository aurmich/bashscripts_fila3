<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Ptv\Filament\Infolists;

use Filament\Infolists\Components;

class AszEffSection extends Components\Section
{
    public static function getDefaultName(): ?string
    {
        return 'asz_eff';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->schema([
            Components\RepeatableEntry::make('aszEff')
                ->schema([
                    Components\TextEntry::make('id'),
                    Components\TextEntry::make('matr'),
                    Components\TextEntry::make('tip-cod')
                        ->default(fn ($record) => $record->asztip.'-'.$record->aszcod),
                    /*
                    Components\Group::make()->schema([
                        Components\TextEntry::make('asztip'),
                        Components\TextEntry::make('aszcod'),
                    ]),
                    */
                    Components\TextEntry::make('ini-fin')
                        ->default(fn ($record) => $record->aszini.'-'.$record->aszfin),
                    /*
                    Components\Group::make()->schema([
                        Components\TextEntry::make('aszini'),
                        Components\TextEntry::make('aszfin'),
                    ]),
                    */
                    Components\TextEntry::make('asz2kd'),
                    Components\TextEntry::make('asz2ka'),
                    Components\TextEntry::make('aszumi'),
                    Components\TextEntry::make('aszdur'),
                    // Components\TextEntry::make('aszann'),
                    // Components\TextEntry::make('asz_txt')->,
                    // ->columnSpan(2),
                    Components\TextEntry::make('propro')
                    // ->default(fn($record)=>$record->propro)
                    ,
                    Components\TextEntry::make('posfun'),

                    Components\TextEntry::make('_gg')
                        ->default(fn ($record) => $record->gg([
                            'date_max' => $this->getRecord()?->getDateMax(),
                        ])),

                    Components\TextEntry::make('_gg_cateco')
                        ->default(function ($record): float {
                            $res = $record->gg(
                                [
                                    'date_max' => $this->getRecord()?->getDateMax(),
                                    'lista_propro' => $this->getRecord()?->lista_propro,
                                    'lista_propro_sup' => $this->getRecord()?->lista_propro_sup,
                                ]
                            );

                            return $res;
                        }),

                    Components\TextEntry::make('_gg_cateco_posfun')
                        ->default(function ($record): float {
                            $res = $record->gg(
                                [
                                    'date_max' => $this->getRecord()->getDateMax(),
                                    'lista_propro' => $this->getRecord()->lista_propro,
                                    'lista_propro_sup' => $this->getRecord()->lista_propro_sup,
                                    'posfun' => $this->getRecord()->posfun_val,
                                ]
                            );

                            return $res;
                        }),
                ])
                ->columns(15),
        ]);
    }
}
