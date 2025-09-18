<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Rating\Providers\Filament;

=======
declare(strict_types=1);

namespace Modules\UI\Providers\Filament;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
>>>>>>> a8f30311 (first)
=======
declare(strict_types=1);

namespace Modules\Lang\Providers\Filament;

>>>>>>> bbec4378 (first)
=======
declare(strict_types=1);

namespace Modules\Job\Providers\Filament;

>>>>>>> c088001a (first)
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected string $module = 'Rating';
=======
declare(strict_types=1);

namespace Modules\Xot\Providers\Filament;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Xot';
>>>>>>> 59bc4fe7 (first)
=======
    protected string $module = 'UI';

    public function panel(Panel $panel): Panel
    {
        // FilamentAsset::register(
        //     [
        //         Css::make('filament-navigation-styles', __DIR__.'/../../resources/dist/plugin.css'),
        //         Js::make('filament-navigation-scripts', __DIR__.'/../../resources/dist/plugin.js'),
        //     ],
        //     'filament-navigation'
        // );

        return parent::panel($panel);
    }
>>>>>>> a8f30311 (first)
=======
    protected string $module = 'Lang';
>>>>>>> bbec4378 (first)
=======
    protected string $module = 'Job';
>>>>>>> c088001a (first)
}
