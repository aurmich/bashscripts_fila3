<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Pages;

use Filament\Pages\Page;
use Modules\Incentivi\Filament\Widgets;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'incentivi::filament.pages.dashboard';

    public function getColumns(): int|string|array
    {
        return [
            'md' => 2,
            'xl' => 3,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        $widgets = [
            [
                'class' => Widgets\HomepageActionsWidget::class,
            ],
            [
                'class' => Widgets\InstructionsWidget::class,
            ],
            [
                'class' => Widgets\LatestProjects::class,
            ],
        ];

        return [
            Widgets\HomepageActionsWidget::make(),
            Widgets\InstructionsWidget::make(),
            Widgets\LatestProjects::make(),
        ];
    }
}
