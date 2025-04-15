<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Progressioni\Filament\Infolists;

use Filament\Infolists\Components;
use Filament\Infolists\Components\Section;
use Modules\Progressioni\Models\CriteriValutazione;

class CriteriValutazioneSection extends Components\Section
{
    public static int $year = 0;

    // public function mount(int $year): void
    // {
    //    $this->year=$year;
    // }

    public static function setYear(int $year): static
    {
        static::$year = $year;

        return app(static::class);
    }

    /**
     * Undocumented function.
     */
    public static function getDefaultName(): ?string
    {
        return 'criteri_valutazione';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $year = static::$year;
        // $year = intval(date('Y')) -  1; // devo prenderlo dal record o sessione
        $criteri_valutazione = CriteriValutazione::where('anno', $year)
            // ->where('value', '!=', 0)
            // ->where('value', '!=', null)
            // ->where('field_name', '!=', null)
            ->get();

        $schema = [];

        foreach ($criteri_valutazione as $criterio) {
            $schema[] = Components\TextEntry::make($criterio->name);
        }
        for ($i = 0; $i < 4; $i++) {
            $schema[] = Components\TextEntry::make('perf_ind_'.($year - $i));
        }
        /*
        $schema[] = Components\TextEntry::make('gg_cateco_posfun');
        $schema[] = Components\TextEntry::make('gg_asz_cateco_posfun');
        $schema[] = Components\TextEntry::make('gg_cateco_posfun_in_sede');
        $schema[] = Components\TextEntry::make('gg_cateco_posfun_fuori_sede');
        $schema[] = Components\TextEntry::make('gg_asz_cateco_posfun_in_sede');
        $schema[] = Components\TextEntry::make('gg_asz_cateco_posfun_fuori_sede');
        */
        $this->schema([
            Section::make('Criteri Valutazione')->schema([
                Components\Grid::make(4)

                    ->schema([

                        ...$schema,
                    ]),
            ]),
        ]);
    }
}
