<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\UI\Filament\Pages;

use Filament\Pages\Page;
use Modules\UI\Filament\Widgets;
=======
namespace Modules\Job\Filament\Pages;

use Filament\Pages\Page;
>>>>>>> c088001a (first)
=======
namespace Modules\Notify\Filament\Pages;

use Filament\Pages\Page;
>>>>>>> d79d9e57 (first)

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

<<<<<<< HEAD
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
=======
declare(strict_types=1);

namespace Modules\Setting\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Process as LaravelProcess;
>>>>>>> 9cec72d6 (first)

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

<<<<<<< HEAD
    protected static string $view = 'lang::filament.pages.dashboard';
>>>>>>> bbec4378 (first)
=======
    protected static string $view = 'job::filament.pages.dashboard';
=======
    protected static string $view = 'setting::filament.pages.dashboard';

    public function upgrade(): void
    {
        $command = 'php artisan filament:upgrade';

        LaravelProcess::run($command);
    }

    protected function getViewData(): array
    {
        return ['a' => 'b'];
    }
>>>>>>> 9cec72d6 (first)

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
<<<<<<< HEAD
>>>>>>> c088001a (first)
=======
    protected static string $view = 'notify::filament.pages.dashboard';

    public function mount(): void
    {
        /*
        $user = auth()->user();
        if (! $user->hasRole('super-admin')) {
            redirect('/admin');
        }
        */
    }
>>>>>>> d79d9e57 (first)
=======
/**
 * @see https://medium.com/@laravelprotips/filament-streamline-multiple-widgets-with-one-dynamic-livewire-filter-ed05c978a97f
 */

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseBashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Modules\User\Filament\Widgets;

class Dashboard extends BaseBashboard
{
    use HasFiltersForm;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    // protected static string $routePath = 'finance';
    // protected static ?string $title = 'Finance dashboard';
    // protected static ?int $navigationSort = 15;

    // protected static string $view = 'user::filament.pages.dashboard';

    /**
     * @return array<class-string<Widget>|WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [
            Widgets\UsersChartWidget::make(['chart_id' => 'bb']),
            // Widgets\UsersChartWidget::make(['chart_id' => 'aa']),
            Widgets\RecentLoginsWidget::class,
        ];
    }

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->native(false)
                        // ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
                        ,
                        DatePicker::make('endDate')
                            ->native(false)
                        // ->minDate(fn (Get $get) => $get('startDate') ?: now())
                        // ->maxDate(now()),
                        ,
                    ])
                    ->columns(3),
            ]);
    }
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
}
