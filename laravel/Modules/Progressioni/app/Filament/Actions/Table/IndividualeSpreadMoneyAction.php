<?php

namespace Modules\Performance\Filament\Actions\Table;

use Filament\Tables\Actions\Action;

/**
 * --
 */
class IndividualeSpreadMoneyAction extends Action
{
    /**
     * ---
     */
    public static function getDefaultName(): ?string
    {
        return 'individuale_spread_money';
    }

    /**
     * ---
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('individuale')
            ->tooltip(__('ptv::actions.'.$this->getDefaultName()))
            ->icon('heroicon-o-currency-euro')
            ->action(function () {
                dddx('qui');
            });
    }
}
