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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Rating\Providers;
<<<<<<< HEAD
=======
declare(strict_types=1);

namespace Modules\UI\Providers;
>>>>>>> a8f30311 (first)
=======
declare(strict_types=1);

namespace Modules\Job\Providers;
>>>>>>> c088001a (first)
=======
declare(strict_types=1);

namespace Modules\Notify\Providers;
>>>>>>> d79d9e57 (first)
=======
declare(strict_types=1);

namespace Modules\User\Providers;
>>>>>>> 0d55b583 (first)
=======
declare(strict_types=1);

namespace Modules\Setting\Providers;
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
declare(strict_types=1);

namespace Modules\Media\Providers;
>>>>>>> c986cc10 (first)
=======
declare(strict_types=1);

namespace Modules\Tenant\Providers;
>>>>>>> 8fc3049b (first)

=======
declare(strict_types=1);

namespace Modules\Badge\Providers;

// --- bases ---
>>>>>>> 7e417e87 (first)
=======
declare(strict_types=1);

namespace Modules\CertFisc\Providers;

// --- bases ---
>>>>>>> 53542950 (first)
=======
declare(strict_types=1);

namespace Modules\ContoAnnuale\Providers;

// --- bases ---
>>>>>>> 26424c5e (first)
=======
declare(strict_types=1);

namespace Modules\Europa\Providers;

// --- bases ---
>>>>>>> c8cd1ec3 (first)
=======
declare(strict_types=1);

namespace Modules\Inail\Providers;

// --- bases ---
>>>>>>> 51c7727d (first)
=======
declare(strict_types=1);

namespace Modules\Incentivi\Providers;

>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Providers;

>>>>>>> b7483fd0 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Providers;

>>>>>>> e0005d7d (first)
=======
declare(strict_types=1);

namespace Modules\Legge104\Providers;

// --- bases ---
>>>>>>> 6907d18e (first)
=======
declare(strict_types=1);

namespace Modules\Legge109\Providers;

// --- bases ---
>>>>>>> 616a71c2 (first)
=======
declare(strict_types=1);

namespace Modules\Mensa\Providers;

// --- bases ---
>>>>>>> c6af2eee (first)
=======
declare(strict_types=1);

namespace Modules\Prenotazioni\Providers;

// --- bases ---
>>>>>>> 4658bb86 (first)
=======
declare(strict_types=1);

namespace Modules\PresenzeAssenze\Providers;

// --- bases ---
>>>>>>> edbb3aab (first)
=======
declare(strict_types=1);

namespace Modules\Progressioni\Providers;

// --- bases ---
>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);

namespace Modules\Questionari\Providers;

// --- bases ---
>>>>>>> fec698af (first)
=======
declare(strict_types=1);

namespace Modules\Sigma\Providers;

// --- bases ---
>>>>>>> f862c51f (first)
=======
declare(strict_types=1);

namespace Modules\Sindacati\Providers;

// --- bases ---
>>>>>>> 9997d18c (first)
=======
declare(strict_types=1);

namespace Modules\Performance\Providers;

// --- bases ---
>>>>>>> 961ad402 (first)
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected string $moduleNamespace = 'Modules\Rating\Http\Controllers';
=======
declare(strict_types=1);

namespace Modules\Xot\Providers;

use Filament\Facades\Filament;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Modules\Xot\Http\Middleware\SetDefaultLocaleForUrls;
use Modules\Xot\Http\Middleware\SetDefaultTenantForUrlsMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

// public function boot(\Illuminate\Routing\Router $router)

// --- bases -----

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     */
    protected string $rootNamespace = 'Modules\Xot\Http\Controllers';

    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Xot\Http\Controllers';
>>>>>>> 59bc4fe7 (first)
=======
    protected string $moduleNamespace = 'Modules\UI\Http\Controllers';
>>>>>>> a8f30311 (first)
=======
    protected string $moduleNamespace = 'Modules\Job\Http\Controllers';
>>>>>>> c088001a (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Notify\Http\Controllers';
>>>>>>> d79d9e57 (first)
=======
    protected string $moduleNamespace = 'Modules\User\Http\Controllers';
>>>>>>> 0d55b583 (first)
=======
    protected string $moduleNamespace = 'Modules\Setting\Http\Controllers';
>>>>>>> 9cec72d6 (first)
=======
    protected string $moduleNamespace = 'Modules\Rating\Http\Controllers';
>>>>>>> 2df6fbc8 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Media\Http\Controllers';
>>>>>>> c986cc10 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Tenant\Http\Controllers';
>>>>>>> 8fc3049b (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Badge\Http\Controllers';
>>>>>>> 7e417e87 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\CertFisc\Http\Controllers';
>>>>>>> 53542950 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\ContoAnnuale\Http\Controllers';
>>>>>>> 26424c5e (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Europa\Http\Controllers';

    public string $name = 'Europa';
>>>>>>> c8cd1ec3 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Inail\Http\Controllers';

    public string $name = 'Inail';
>>>>>>> 51c7727d (first)
=======
    protected string $moduleNamespace = 'Modules\Incentivi\Http\Controllers';
>>>>>>> 15ea09e2 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\IndennitaCondizioniLavoro\Http\Controllers';
>>>>>>> b7483fd0 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\IndennitaResponsabilita\Http\Controllers';
>>>>>>> e0005d7d (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Legge104\Http\Controllers';

    public string $name = 'Legge104';
>>>>>>> 6907d18e (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Legge109\Http\Controllers';
>>>>>>> 616a71c2 (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Mensa\Http\Controllers';

    public string $name = 'Mensa';
>>>>>>> c6af2eee (first)
=======
declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Providers;

// --- bases ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\MobilitaVolontaria\Http\Controllers';
>>>>>>> 8e6e7d4c (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Prenotazioni\Http\Controllers';

    public string $name = 'Prenotazioni';
>>>>>>> 4658bb86 (first)
=======
    public string $name = 'PresenzeAssenze';

    protected string $moduleNamespace = 'Modules\PresenzeAssenze\Http\Controllers';
>>>>>>> edbb3aab (first)
=======
    public string $name = 'Progressioni';

    protected string $moduleNamespace = 'Modules\Progressioni\Http\Controllers';
>>>>>>> bcab6efe (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Questionari\Http\Controllers';

    public string $name = 'Questionari';
>>>>>>> fec698af (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Sigma\Http\Controllers';
>>>>>>> f862c51f (first)
=======
    public string $name = 'Sindacati';

    protected string $moduleNamespace = 'Modules\Sindacati\Http\Controllers';
>>>>>>> 9997d18c (first)
=======
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Performance\Http\Controllers';
>>>>>>> 961ad402 (first)

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public string $name = 'Rating';
=======
    public string $name = 'Xot';

    /**
     * Called before routes are registered.
     * Register any model bindings or pattern based filters.
=======
declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Provider per la registrazione delle rotte del modulo Lang.
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected string $moduleNamespace = 'Modules\Lang\Http\Controllers';

    /**
     * The directory of the module.
     *
     * @var string
     */
    protected string $module_dir = __DIR__;

    /**
     * The namespace of the module.
     *
     * @var string
     */
    protected string $module_ns = __NAMESPACE__;

    /**
     * The name of the module.
     *
     * @var string
     */
    public string $name = 'Lang';

    /**
     * Bootstrap the module services.
     *
     * @return void
>>>>>>> bbec4378 (first)
     */
    public function boot(): void
    {
        parent::boot();
<<<<<<< HEAD
        $router = app('router');

        $this->registerLang();
        $this->registerRoutePattern($router);
        $this->registerMyMiddleware($router);
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(base_path('Modules/Xot/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(base_path('Modules/Xot/routes/api.php'));
    }

    public function registerMyMiddleware(Router $router): void
    {
        $router->prependMiddlewareToGroup('web', SetDefaultTenantForUrlsMiddleware::class);
        $router->prependMiddlewareToGroup('api', SetDefaultTenantForUrlsMiddleware::class);
    }

    public function registerLang(): void
    {
        $langs = ['it', 'en'];
        $user = request()->user();
        $lang = app()->getLocale();
        if ($user !== null) {
            $lang = $user->lang ?? $lang;
        }
        $locales = config('laravellocalization.supportedLocales');
        if (is_array($locales)) {
            $langs = array_keys($locales);
        }

        if (in_array(request()->segment(1), $langs, false)) {
            $lang = request()->segment(1);
=======
        $this->registerLang();
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();
    }

    /**
     * Registra le impostazioni di lingua basate sulla configurazione.
     *
     * @return void
     */
    public function registerLang(): void
    {
        /** @var array<string, array<string, string|null>> $locales */
        $locales = config('laravellocalization.supportedLocales');
        
        if (! is_array($locales)) {
            $locales = ['it' => ['name' => 'it'], 'en' => ['name' => 'en']];
        }
        
        /** @var array<string> $langs */
        $langs = array_keys($locales);

        $n = 1;
        if (inAdmin()) {
            $n = 3;
        }

        if (in_array(request()->segment($n), $langs, false)) {
            /** @var string|null $lang */
            $lang = request()->segment($n);
>>>>>>> bbec4378 (first)
            if ($lang !== null) {
                app()->setLocale($lang);
            }
        }
<<<<<<< HEAD

        URL::defaults([
            'lang' => $lang,
        ]);
    }

    public function registerRoutePattern(Router $router): void
    {
        $langs = config('laravellocalization.supportedLocales');
        if (! is_array($langs)) {
            $langs = ['it' => 'it', 'en' => 'en'];
        }

        $lang_pattern = collect(array_keys($langs))->implode('|');
        $lang_pattern = '/|'.$lang_pattern.'|/i';

        $router->pattern('lang', $lang_pattern);

        $models = config('morph_map');
        if (! is_array($models)) {
            $models = [];
        }

        $models_collect = collect(array_keys($models));
        $models_collect->implode('|');
        $models_collect->map(
            fn ($item) => Str::plural(is_string($item) ? $item : (string) $item)
        )->implode('|');
    }

    // end registerRoutePattern
>>>>>>> 59bc4fe7 (first)
=======
    public string $name = 'UI';
>>>>>>> a8f30311 (first)
=======
    }
>>>>>>> bbec4378 (first)
=======
    public string $name = 'Job';
>>>>>>> c088001a (first)
=======
    public string $name = 'Notify';
>>>>>>> d79d9e57 (first)
=======
    public string $name = 'User';
>>>>>>> 0d55b583 (first)
=======
    public string $name = 'Setting';
>>>>>>> 9cec72d6 (first)
=======

    public string $name = 'Rating';
>>>>>>> 2df6fbc8 (first)
=======

    public string $name = 'Media';
>>>>>>> c986cc10 (first)
=======

    public string $name = 'Tenant';
>>>>>>> 8fc3049b (first)
=======

    public string $name = 'Badge';
>>>>>>> 7e417e87 (first)
=======

    public string $name = 'CertFisc';
>>>>>>> 53542950 (first)
=======

    public string $name = 'ContoAnnuale';
>>>>>>> 26424c5e (first)
=======
>>>>>>> c8cd1ec3 (first)
=======
>>>>>>> 51c7727d (first)
=======
    public string $name = 'Incentivi';
>>>>>>> 15ea09e2 (first)
=======

    public string $name = 'IndennitaCondizioniLavoro';
>>>>>>> b7483fd0 (first)
=======

    public string $name = 'IndennitaResponsabilita';
>>>>>>> e0005d7d (first)
=======
>>>>>>> 6907d18e (first)
=======

    public string $name = 'Legge109';
>>>>>>> 616a71c2 (first)
=======
>>>>>>> c6af2eee (first)
=======

    public string $name = 'MobilitaVolontaria';
>>>>>>> 8e6e7d4c (first)
=======
>>>>>>> 4658bb86 (first)
=======
>>>>>>> edbb3aab (first)
=======
>>>>>>> bcab6efe (first)
=======
>>>>>>> fec698af (first)
=======

    public string $name = 'Sigma';
>>>>>>> f862c51f (first)
=======
>>>>>>> 9997d18c (first)
=======

    public string $name = 'Performance';
>>>>>>> 961ad402 (first)
}
