<?php

namespace Modules\Performance\Filament\Actions\Table;

use Filament\Tables\Actions\Action;
use Modules\Performance\Actions\OrganizzativaSpreadMoneyByYearAction;
use Modules\Performance\Filament\Resources\PerformanceFondoResource;

/**
 * --
 */
class OrganizzativaSpreadMoneyAction extends Action
{
    /**
     * ---
     */
    public static function getDefaultName(): ?string
    {
        return 'organizzativa_spread_money';
    }

    /**
     * ---
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('organizzativa')
            ->tooltip(__('ptv::actions.'.$this->getDefaultName()))
            ->icon('heroicon-o-currency-euro')
            ->url(fn ($record) => PerformanceFondoResource::getUrl('organizzativa-money', ['record' => $record]));
        /*
        ->action(

            function($record){
                app(OrganizzativaSpreadMoneyByYearAction::class)->execute((string)$record->anno);
            }
        );
        */
    }
}
