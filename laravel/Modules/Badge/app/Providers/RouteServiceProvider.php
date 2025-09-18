<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Badge\Providers;
=======
namespace Modules\Inail\Providers;
>>>>>>> 55edff60 (.)

// --- bases ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     */
<<<<<<< HEAD
    protected string $moduleNamespace = 'Modules\Badge\Http\Controllers';
=======
    protected string $moduleNamespace = 'Modules\Inail\Http\Controllers';

    public string $name = 'Inail';
>>>>>>> 55edff60 (.)

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
<<<<<<< HEAD

    public string $name = 'Badge';
=======
>>>>>>> 55edff60 (.)
}
