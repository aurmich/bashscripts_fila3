<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\PerformanceFondoResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Modules\Performance\Actions\Organizzativa as ActionsOrgaizzativa;
use Modules\Performance\Actions\UpdateHaDirittoAction;
use Modules\Performance\Filament\Resources\PerformanceFondoResource;
use Modules\Performance\Models\Organizzativa;
use Modules\Xot\Actions\GetTransKeyAction;

class OrganizzativaMoney extends Page
{
    // use InteractsWithRecord;

    protected static string $resource = PerformanceFondoResource::class;

    /**
     * ---.
     */
    public function getView(): string
    {
        $view = app(GetTransKeyAction::class)->execute();

        return $view;
    }

    /**
     * ---.
     */
    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }

    /**
     * ---.
     */
    public function getViewData(): array
    {
        $year = '2023';

        app(ActionsOrgaizzativa\UpdateAssenzeAction::class)->execute($year, 'dip');
        app(UpdateHaDirittoAction::class)->execute(Organizzativa::class, $year, 'dip');
        app(ActionsOrgaizzativa\UpdateQuotaTeoricaAction::class)->execute($year, 'dip');
        app(ActionsOrgaizzativa\UpdateBudgetAssegnatoAction::class)->execute($year, 'dip');

        app(ActionsOrgaizzativa\UpdateQuotaEffettivaAction::class)->execute($year, 'dip');
        app(ActionsOrgaizzativa\UpdateRestiAction::class)->execute($year, 'dip');
        app(ActionsOrgaizzativa\UpdateTotStabiAction::class)->execute($year, 'dip');
        app(ActionsOrgaizzativa\UpdateRestiPondAction::class)->execute($year, 'dip');
        app(ActionsOrgaizzativa\UpdateImportoTotaleAction::class)->execute($year, 'dip');
        app(ActionsOrgaizzativa\CheckSumAction::class)->execute($year, 'dip');

        return [
            'title' => 'Organizzativa Money',
            'icon' => 'heroicon-o-currency-euro',
        ];
    }
}
