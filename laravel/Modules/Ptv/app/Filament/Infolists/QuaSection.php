<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Ptv\Filament\Infolists;

use Filament\Infolists\Components;

class QuaSection extends Components\Section
{
    public static function getDefaultName(): ?string
    {
        return 'qua';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->schema([
            Components\Grid::make(4)->schema([
                Components\TextEntry::make('propro'),
                Components\TextEntry::make('posfun'),

                Components\TextEntry::make('categoria_eco'),
                Components\TextEntry::make('posiz'),
                Components\TextEntry::make('posiz_txt'),
                Components\TextEntry::make('disci1'),
                Components\TextEntry::make('disci1_txt'),
                // Components\TextEntry::make('categoria_ecoval'),
                // Components\TextEntry::make('posfunval'),
            ]),
        ]);
    }
}
