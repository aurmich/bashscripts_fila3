<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Ptv\Filament\Infolists;

use Filament\Infolists\Components;

class Asz00fSection extends Components\Section
{
    public static function getDefaultName(): ?string
    {
        return 'asz00f';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->schema([
            Components\RepeatableEntry::make('asz00f')
                ->schema([
                    Components\TextEntry::make('id'),
                    Components\TextEntry::make('matr'),
                    Components\TextEntry::make('asztip'),
                    Components\TextEntry::make('aszcod'),
                    Components\TextEntry::make('aszini'),
                    Components\TextEntry::make('aszfin'),
                    Components\TextEntry::make('asz2kd'),
                    Components\TextEntry::make('asz2ka'),
                    Components\TextEntry::make('aszumi'),
                    Components\TextEntry::make('aszdur'),
                    // Components\TextEntry::make('aszann'),
                    // Components\TextEntry::make('asz_txt')->,
                    // ->columnSpan(2),
                ])
                ->columns(11),
        ]);
    }
}
