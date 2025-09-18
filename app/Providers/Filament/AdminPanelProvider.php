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
<<<<<<< HEAD
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> bc2abf99 (.)
/**
 * ---.
 */

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\Providers\Filament;

=======
declare(strict_types=1);

namespace Modules\UI\Providers\Filament;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
>>>>>>> a8f30311 (first)
=======
declare(strict_types=1);

namespace Modules\Lang\Providers\Filament;

>>>>>>> bbec4378 (first)
=======
declare(strict_types=1);

namespace Modules\Job\Providers\Filament;

>>>>>>> c088001a (first)
=======
namespace Modules\Notify\Providers\Filament;

use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Modules\Xot\Datas\XotData;
>>>>>>> d79d9e57 (first)
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
namespace Modules\User\Providers\Filament;

use Filament\Navigation\MenuItem;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Modules\User\Filament\Pages\MyProfilePage;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
declare(strict_types=1);

namespace Modules\Setting\Providers\Filament;

>>>>>>> 9cec72d6 (first)
=======
namespace Modules\Rating\Providers\Filament;

>>>>>>> 2df6fbc8 (first)
=======
declare(strict_types=1);

namespace Modules\Media\Providers\Filament;

use Filament\Panel;
>>>>>>> c986cc10 (first)
=======
=======
>>>>>>> 0253339c (first)
declare(strict_types=1);

namespace Modules\Tenant\Providers\Filament;

use Filament\Panel;
<<<<<<< HEAD
>>>>>>> 8fc3049b (first)
=======
declare(strict_types=1);

namespace Modules\Incentivi\Providers\Filament;

>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Providers\Filament;

>>>>>>> b7483fd0 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Providers\Filament;

>>>>>>> e0005d7d (first)
=======
namespace Modules\Progressioni\Providers\Filament;

>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);

namespace Modules\Sigma\Providers\Filament;

>>>>>>> f862c51f (first)
=======
declare(strict_types=1);

namespace Modules\Performance\Providers\Filament;

>>>>>>> 961ad402 (first)
=======
declare(strict_types=1);

namespace Modules\Ptv\Providers\Filament;

use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
>>>>>>> dc18abbe (first)
=======
namespace Modules\Progressioni\Providers\Filament;

>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
namespace Modules\Rating\Providers\Filament;

>>>>>>> bc2abf99 (.)
=======
declare(strict_types=1);

namespace Modules\Activity\Providers\Filament;

use Filament\Panel;
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
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
    protected string $module = 'Rating';
=======
declare(strict_types=1);

namespace Modules\Xot\Providers\Filament;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Xot';
>>>>>>> 59bc4fe7 (first)
=======
    protected string $module = 'UI';

    public function panel(Panel $panel): Panel
    {
        // FilamentAsset::register(
        //     [
        //         Css::make('filament-navigation-styles', __DIR__.'/../../resources/dist/plugin.css'),
        //         Js::make('filament-navigation-scripts', __DIR__.'/../../resources/dist/plugin.js'),
        //     ],
        //     'filament-navigation'
        // );

        return parent::panel($panel);
    }
>>>>>>> a8f30311 (first)
=======
    protected string $module = 'Lang';
>>>>>>> bbec4378 (first)
=======
    protected string $module = 'Job';
>>>>>>> c088001a (first)
=======
    protected string $module = 'Notify';

    public function panel(Panel $panel): Panel
    {
        if (! XotData::make()->disable_database_notifications) {
            DatabaseNotifications::trigger('notify::livewire.database-notifications-trigger');
            // DatabaseNotifications::databaseNotificationsPollingInterval('30s');
            DatabaseNotifications::pollingInterval('60s');
            FilamentView::registerRenderHook(
                'panels::user-menu.before',
                static fn (): string => Blade::render('@livewire(\'database-notifications\')'),
            );
        }

        return parent::panel($panel);
    }
>>>>>>> d79d9e57 (first)
=======
    protected string $module = 'User';
=======
    protected string $module = 'Media';
>>>>>>> c986cc10 (first)
=======
    protected string $module = 'User';
>>>>>>> e83070fd (.)
=======
    protected string $module = 'User';
>>>>>>> bdeae81f (first)

    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            static fn (): string => Blade::render("@livewire('socialite.buttons')"),
        );

        /*-- moved into Gdpr
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn (): string => Blade::render('@livewire(\'terms-of-service\')'),
        );
        */

        /* -- moved into Notify
        DatabaseNotifications::trigger('notifications.database-notifications-trigger');
        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            fn (): string => Blade::render('@livewire(\'database-notifications\')'),
        );
        //*/

        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            static fn (): string => Blade::render("@livewire('team.change')"),
        );

        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            // static fn (): string => View::make('user::badges.super-admin')->render(),
            static fn (): string => Blade::render("@livewire('profile.super-admin')"),
        );

        /*
        $panel->renderHook(
            'panels::user-menu.before',
            fn (): string => Blade::render('@livewire(\'team.change\')'),
        );
        */
        // $tenantId = request()->route()->parameter('tenant');
        // $profile_url = MyProfilePage::getUrl(panel: 'admin');
        // $panel->default();
        // $profile_url = MyProfilePage::getUrl(panel: 'admin');
        // $panel = $panel->pages([
        //     MyProfilePage::class,
        // ]);
        // $profile_url = '#';
        // $panel->userMenuItems([
        //     // 'account' => MenuItem::make()->url($profile_url),
        //     MenuItem::make()
        //
        //         ->url(fn (): string => '#')
        //         ->icon('heroicon-m-cog-8-tooth'),
        // ]);

        return $panel;
    }
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
    protected string $module = 'Setting';
>>>>>>> 9cec72d6 (first)
=======
    protected string $module = 'Rating';
>>>>>>> 2df6fbc8 (first)
=======
        return $panel;
    }
>>>>>>> c986cc10 (first)
=======
=======
>>>>>>> 0253339c (first)
    protected string $module = 'Tenant';

    public function panel(Panel $panel): Panel
    {
        return parent::panel($panel);
    }
<<<<<<< HEAD
>>>>>>> 8fc3049b (first)
=======
    protected string $module = 'Incentivi';
>>>>>>> 15ea09e2 (first)
=======
    protected string $module = 'IndennitaCondizioniLavoro';
>>>>>>> b7483fd0 (first)
=======
    protected string $module = 'IndennitaResponsabilita';
>>>>>>> e0005d7d (first)
=======
    protected string $module = 'Progressioni';
>>>>>>> bcab6efe (first)
=======
    protected string $module = 'Sigma';
>>>>>>> f862c51f (first)
=======
    protected string $module = 'Performance';
>>>>>>> 961ad402 (first)
=======
    protected string $module = 'Ptv';

    public function panel(Panel $panel): Panel
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            static fn (): string => Blade::render("@component('xot::x-debug')"),
            // static fn (): string => 'qui',
        );

        return parent::panel($panel);
    }
>>>>>>> dc18abbe (first)
=======
    protected string $module = 'Progressioni';
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
    protected string $module = 'Rating';
>>>>>>> bc2abf99 (.)
=======
    protected string $module = 'Activity';

    public function panel(Panel $panel): Panel
    {

        $panel = parent::panel($panel);

        return $panel;
    }
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
}
