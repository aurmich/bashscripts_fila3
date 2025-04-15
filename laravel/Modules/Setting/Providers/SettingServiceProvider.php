<?php

declare(strict_types=1);

namespace Modules\Setting\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * ---.
 */
class SettingServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'setting';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
