<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
declare(strict_types=1);

namespace Modules\Media\Filament\Pages;

use Filament\Pages\Page;
>>>>>>> c986cc10 (first)
=======
declare(strict_types=1);

namespace Modules\Tenant\Filament\Pages;

use Filament\Pages\Page;
>>>>>>> 8fc3049b (first)
=======
declare(strict_types=1);

namespace Modules\Incentivi\Filament\Pages;

use Filament\Pages\Page;
use Modules\Incentivi\Filament\Widgets;
>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Pages;

use Filament\Pages\Page;
>>>>>>> b7483fd0 (first)
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
declare(strict_types=1);

namespace Modules\Progressioni\Filament\Pages;

use Filament\Pages\Page;
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static string $view = 'ui::filament.pages.dashboard';
=======
    protected static string $view = 'incentivi::filament.pages.dashboard';

    public function getColumns(): int|string|array
    {
        return [
            'md' => 2,
            'xl' => 3,
        ];
    }
>>>>>>> 15ea09e2 (first)

    protected function getHeaderWidgets(): array
    {
        $widgets = [
            [
<<<<<<< HEAD
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
=======
                'class' => Widgets\HomepageActionsWidget::class,
            ],
            [
                'class' => Widgets\InstructionsWidget::class,
            ],
            [
                'class' => Widgets\LatestProjects::class,
>>>>>>> 15ea09e2 (first)
            ],
        ];

        return [
<<<<<<< HEAD
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
=======
    protected static string $view = 'media::filament.pages.dashboard';
>>>>>>> c986cc10 (first)
=======
    protected static string $view = 'tenant::filament.pages.dashboard';
>>>>>>> 8fc3049b (first)
=======
            Widgets\HomepageActionsWidget::make(),
            Widgets\InstructionsWidget::make(),
            Widgets\LatestProjects::make(),
        ];
    }
>>>>>>> 15ea09e2 (first)
=======
    protected static string $view = 'indennitacondizionilavoro::filament.pages.dashboard';
>>>>>>> b7483fd0 (first)
=======
    protected static string $view = 'progressioni::filament.pages.dashboard';
>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);

namespace Modules\Sigma\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getSubheading(): string|Htmlable|null
    {
=======
declare(strict_types=1);

namespace Modules\Ptv\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Ptv\Filament\Widgets\AdminWidgets;

class Dashboard extends BasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'ptv::filament.pages.dashboard';
    public function getSubheading(): string|Htmlable|null
    {
        // if (auth()->user()->is_admin) {
        //    return '--';
        // }

>>>>>>> dc18abbe (first)
        return 'Here you will see an overview of your tasks.';
    }

    public function getWidgets(): array
    {
        return [
<<<<<<< HEAD
            // ...
        ];
    }
>>>>>>> f862c51f (first)
=======
namespace Modules\Performance\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashBoard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    /*
    public function __construct(){
        $user=Auth::user();
        if($user==null){
            abort(403);
        }

        $name=static::getName();//"getName" => "modules.performance.filament.pages.dashboard"
        $module=collect(explode('.',(string) $name))->get(1);
        if(!$user->hasModule($module)){
            abort(403);
        }


    }
    */
>>>>>>> 961ad402 (first)
=======
            AdminWidgets::class,
        ];
    }
>>>>>>> dc18abbe (first)
=======
    protected static string $view = 'progressioni::filament.pages.dashboard';
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
}
