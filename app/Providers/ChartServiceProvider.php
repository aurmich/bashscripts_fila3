<<<<<<< HEAD:app/Providers/ChartServiceProvider.php
<?php

declare(strict_types=1);

namespace Modules\Chart\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class ChartServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Chart';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
=======
<?php

declare(strict_types=1);

namespace Modules\Chart\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class ChartServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'chart';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
>>>>>>> aa0245c (up):Providers/ChartServiceProvider.php
