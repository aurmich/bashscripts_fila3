<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class IndennitaCondizioniLavoroServiceProvider extends XotBaseServiceProvider
{
    public string $module_dir = __DIR__;

    public string $module_ns = __NAMESPACE__;

    public string $name = 'IndennitaCondizioniLavoro';
}
