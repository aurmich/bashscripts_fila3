<?php

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
    public function boot(): void
    {
        parent::boot();
        $this->registerLang();
    }

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
    public function register(): void
    {
        parent::register();
        // $this->registerLang();
    }

    public function registerLang(): void
    {
        $locales = config('laravellocalization.supportedLocales');
        if (! \is_array($locales)) {
            $locales = ['it' => 'it', 'en' => 'en'];
        }
        $langs = array_keys($locales);

        /*
        if (! \is_array($langs)) {
            throw new \Exception('[.__LINE__.]['.class_basename(self::class).']');
        }
        \getRouteParameters();
        */
>>>>>>> 6a0fe737 (.)
        $n = 1;
        if (inAdmin()) {
            $n = 3;
        }

<<<<<<< HEAD
        if (in_array(request()->segment($n), $langs, false)) {
            /** @var string|null $lang */
            $lang = request()->segment($n);
            if ($lang !== null) {
=======
        if (\in_array(request()->segment($n), $langs, false)) {
            $lang = request()->segment($n);
            if (null !== $lang) {
>>>>>>> 6a0fe737 (.)
                app()->setLocale($lang);
            }
        }
    }
}
