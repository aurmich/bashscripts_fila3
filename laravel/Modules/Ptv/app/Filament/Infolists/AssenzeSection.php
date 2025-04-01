<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Ptv\Filament\Infolists;

use Filament\Infolists\Components;

class AssenzeSection extends Components\Section
{
    public static function getDefaultName(): ?string
    {
        return 'Assenze';
    }

    protected function setUp(): void
    {
        parent::setUp();

        // dddx([
        // 'getRecord'=>$this->getRecord(),
        // 'state'=>$this->getState(),
        // 'state' => $this->formatStateUsing(),
        //    'methods'=>get_class_methods($this),
        // ]);

        $this->schema([
            Components\RepeatableEntry::make('assenze')->schema([
                // Components\TextEntry::make('id'),
                Components\TextEntry::make('tipo'),
                Components\TextEntry::make('codice'),
                Components\TextEntry::make('descr'),
                // Components\TextEntry::make('anno'),
                Components\TextEntry::make('umi'),
                // Components\TextEntry::make('dur'),
            ])
            // ->formatStateUsing(fn($record)=>dddx($record))
                ->columns(11),
        ]);
    }
}
