<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Legge104\Providers;
=======
namespace Modules\Sindacati\Providers;
>>>>>>> 55edff60 (.)

// --- bases ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
<<<<<<< HEAD
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Legge104\Http\Controllers';

    public string $name = 'Legge104';
=======
    public string $name = 'Sindacati';

    protected string $moduleNamespace = 'Modules\Sindacati\Http\Controllers';
>>>>>>> 55edff60 (.)

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
