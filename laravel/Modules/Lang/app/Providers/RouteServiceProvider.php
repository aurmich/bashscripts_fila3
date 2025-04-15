<?php

declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

<<<<<<< HEAD
=======
/**
 * Provider per la registrazione delle rotte del modulo Lang.
 */
>>>>>>> origin/dev
class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Lang\Http\Controllers';

<<<<<<< HEAD
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $name = 'Lang';

=======
    /**
     * The directory of the module.
     */
    protected string $module_dir = __DIR__;

    /**
     * The namespace of the module.
     */
    protected string $module_ns = __NAMESPACE__;

    /**
     * The name of the module.
     */
    public string $name = 'Lang';

    /**
     * Bootstrap the module services.
     */
>>>>>>> origin/dev
    public function boot(): void
    {
        parent::boot();
        $this->registerLang();
    }

<<<<<<< HEAD
=======
    /**
     * Register the module services.
     */
>>>>>>> origin/dev
    public function register(): void
    {
        parent::register();
        // $this->registerLang();
    }

<<<<<<< HEAD
    public function registerLang(): void
    {
        $locales = config('laravellocalization.supportedLocales');
        if (! \is_array($locales)) {
            $locales = ['it' => 'it', 'en' => 'en'];
        }
=======
    /**
     * Registra le impostazioni di lingua basate sulla configurazione.
     */
    public function registerLang(): void
    {
        /** @var array<string, array<string, string>>|null $locales */
        $locales = config('laravellocalization.supportedLocales');

        if (! \is_array($locales)) {
            $locales = ['it' => ['name' => 'it'], 'en' => ['name' => 'en']];
        }

        /** @var array<string> $langs */
>>>>>>> origin/dev
        $langs = array_keys($locales);

        /*
        if (! \is_array($langs)) {
            throw new \Exception('[.__LINE__.]['.class_basename(self::class).']');
        }
        \getRouteParameters();
        */
        $n = 1;
        if (inAdmin()) {
            $n = 3;
        }

        if (\in_array(request()->segment($n), $langs, false)) {
<<<<<<< HEAD
=======
            /** @var string|null $lang */
>>>>>>> origin/dev
            $lang = request()->segment($n);
            if (null !== $lang) {
                app()->setLocale($lang);
            }
        }
    }
}
