<<<<<<< HEAD
<<<<<<< HEAD:app/Providers/RouteServiceProvider.php
=======
>>>>>>> origin/dev
<?php

declare(strict_types=1);

namespace Modules\Predict\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    protected string $moduleNamespace = 'Modules\Predict\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
    public string $name = 'Predict';
}
<<<<<<< HEAD
=======
<?php

declare(strict_types=1);

namespace Modules\Predict\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    protected string $moduleNamespace = 'Modules\Predict\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
>>>>>>> cf3ae71 (up):Providers/RouteServiceProvider.php
=======
>>>>>>> origin/dev
