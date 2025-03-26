<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Fields;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class ValutatoreField extends Select
{
    protected function setUp(): void
    {
        parent::setUp();
        Select::make('valutatore_id')
            ->label('valutatore')
            ->options(function () {
                dddx('a');

                /*
                                                        dddx([
                                                            'record'=>$record,
                                                            'livewire'=>$livewire,
                                                            'this'=>$this
                                                        ])
                                                        ;
                                                        */
                return ['a' => 'a'];
                // app(GetValutatoriOptions::class)
                // ->execute('Progressioni', $get('anno'))),
            });

        /*
        $this->translateLabel()
            ->label('camping::asset.fields.area')
            ->relationship(
                name: 'area',
                titleAttribute: 'name',
                modifyQueryUsing: fn (Builder $query) => $query->orderBy('name'),
            )
            ->searchable()
            ->preload()
            ->nullable()
            ->hiddenOn(['view']);
        */
    }
}
