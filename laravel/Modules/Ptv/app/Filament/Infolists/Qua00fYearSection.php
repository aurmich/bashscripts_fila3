<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Ptv\Filament\Infolists;

use Filament\Infolists\Components;

class Qua00fYearSection extends Components\Section
{
    public static function getDefaultName(): ?string
    {
        return 'qua00f_year';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->schema([
            Components\RepeatableEntry::make('qua00f_year')
                ->schema([
                    Components\TextEntry::make('id'),
                    Components\TextEntry::make('matr'),
                    Components\TextEntry::make('propro'),
                    Components\TextEntry::make('posfun'),
                    Components\TextEntry::make('posiz'),
                    Components\TextEntry::make('qua2kd'),
                    Components\TextEntry::make('qua2ka'),
                    // Components\TextEntry::make('quaann'),
                    // Components\TextEntry::make('gg'),
                    // Components\TextEntry::make('asz_txt')->,
                    // ->columnSpan(2),
                ])
                ->columns(11),
        ]);
    }
}
