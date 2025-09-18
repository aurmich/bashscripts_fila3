<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\UI\Filament\Pages;

use Filament\Pages\Page;
use Modules\UI\Filament\Widgets;
=======
namespace Modules\Job\Filament\Pages;

use Filament\Pages\Page;
>>>>>>> c088001a (first)

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

<<<<<<< HEAD
    protected static string $view = 'ui::filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        $widgets = [
            [
                'class' => Widgets\TestChartWidget::class,
                'properties' => [
                    'qid' => 5,
                    'max_height' => '900px',
                    'type' => 'pie',
                ],
            ],
            [
                'class' => Widgets\TestChartWidget::class,
                'properties' => [
                    'qid' => 7,
                    'type' => 'bar',
                ],
            ],
            [
                'class' => Widgets\TestChartWidget::class,
                'properties' => [
                    'qid' => 9,
                    'type' => 'bar',
                ],
            ],
        ];

        return [
            // Widgets\TestChartWidget::make(['qid' => 5]),
            // Widgets\TestChartWidget::make(['qid' => 6]),
            // Widgets\StatsOverviewWidget::class,

            Widgets\StatWithIconWidget::make(['label' => 'Unique views', 'value' => '192.1k']),
            Widgets\TestWidget::make(['widgets' => $widgets]),
            Widgets\TestWidget::make(['widgets' => $widgets]),
            Widgets\TestWidget::make(['widgets' => $widgets]),
            Widgets\TestWidget::make(['widgets' => $widgets]),
        ];
    }
=======
namespace Modules\Lang\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'lang::filament.pages.dashboard';
>>>>>>> bbec4378 (first)
=======
    protected static string $view = 'job::filament.pages.dashboard';

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
>>>>>>> c088001a (first)
}
