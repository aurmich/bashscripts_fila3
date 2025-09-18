<?php

declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Provider per la registrazione delle rotte del modulo Lang.
 */
=======
>>>>>>> 55edff60 (.)
=======
=======
/**
 * Provider per la registrazione delle rotte del modulo Lang.
 */
>>>>>>> origin/dev
>>>>>>> bb045b6d (.)
class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 6a0fe737 (.)
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

<<<<<<< HEAD
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
     */
=======
    public string $name = 'Lang';

>>>>>>> 6a0fe737 (.)
=======
     */
    protected string $moduleNamespace = 'Modules\Lang\Http\Controllers';

<<<<<<< HEAD
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $name = 'Lang';

<<<<<<< HEAD
>>>>>>> 55edff60 (.)
=======
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
>>>>>>> bb045b6d (.)
    public function boot(): void
    {
        parent::boot();
        $this->registerLang();
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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

=======
=======
>>>>>>> 55edff60 (.)
=======
=======
    /**
     * Register the module services.
     */
>>>>>>> origin/dev
>>>>>>> bb045b6d (.)
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
<<<<<<< HEAD
>>>>>>> 6a0fe737 (.)
=======
>>>>>>> 55edff60 (.)
        $n = 1;
        if (inAdmin()) {
            $n = 3;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        if (in_array(request()->segment($n), $langs, false)) {
            /** @var string|null $lang */
            $lang = request()->segment($n);
            if ($lang !== null) {
=======
        if (\in_array(request()->segment($n), $langs, false)) {
<<<<<<< HEAD
=======
            /** @var string|null $lang */
>>>>>>> origin/dev
            $lang = request()->segment($n);
            if (null !== $lang) {
>>>>>>> 6a0fe737 (.)
=======
        if (\in_array(request()->segment($n), $langs, false)) {
            $lang = request()->segment($n);
            if (null !== $lang) {
>>>>>>> 55edff60 (.)
                app()->setLocale($lang);
            }
        }
    }
}
