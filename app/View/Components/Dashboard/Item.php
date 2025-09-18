<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Rating\View\Components\Dashboard;

=======
namespace Modules\Xot\View\Components\Dashboard;

use Illuminate\Contracts\Support\Renderable;
>>>>>>> 59bc4fe7 (first)
use Illuminate\View\Component;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Field.
 */
class Item extends Component
{
<<<<<<< HEAD
    public function render()
    {
        return '';
=======
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'xot::components.dashboard.item';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
>>>>>>> 59bc4fe7 (first)
    }
}
