<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\Progressioni\Filament\Infolists;

use Filament\Infolists\Components;
use Filament\Infolists\Components\Actions\Action;
use Modules\Progressioni\Actions\RefreshHaDirittoAction;
use Modules\Progressioni\Models\CriteriEsclusione;

use function Safe\date;

class HaDirittoSection extends Components\Section
{
    /**
     * Undocumented function.
     */
    public static function getDefaultName(): ?string
    {
        return 'ha_diritto';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $year = intval(date('Y')) - 1; // devo prenderlo dal record
        $criteri_esclusione = CriteriEsclusione::where('anno', $year)
            ->where('value', '!=', 0)
            ->where('value', '!=', null)
            ->where('field_name', '!=', null)
            ->get();

        $schema = [];

        foreach ($criteri_esclusione as $criterio) {
            $schema[] = Components\TextEntry::make($criterio->field_name);
        }
        $schema[] = Components\TextEntry::make('gg_cateco_posfun');
        $schema[] = Components\TextEntry::make('gg_asz_cateco_posfun');
        $schema[] = Components\TextEntry::make('gg_cateco_posfun_in_sede');
        $schema[] = Components\TextEntry::make('gg_cateco_posfun_fuori_sede');
        $schema[] = Components\TextEntry::make('gg_asz_cateco_posfun_in_sede');
        $schema[] = Components\TextEntry::make('gg_asz_cateco_posfun_fuori_sede');

        $this->schema([
            Components\Grid::make(4)->schema([
                Components\TextEntry::make('ha_diritto')
                    ->prefixAction(
                        Action::make('ricalcolaDiritto')
                            ->icon('heroicon-o-arrow-path')
                            ->requiresConfirmation()
                            ->action(function ($record) {
                                app(RefreshHaDirittoAction::class)->execute($record);
                            })
                    ),
                Components\TextEntry::make('motivo'),
                ...$schema,
            ]),
        ]);
    }
}
