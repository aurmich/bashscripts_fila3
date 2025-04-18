<<<<<<< HEAD
<<<<<<< HEAD:app/Providers/PredictServiceProvider.php
=======
>>>>>>> origin/dev
<?php

declare(strict_types=1);

namespace Modules\Predict\Providers;

use Illuminate\Routing\Router;
use Modules\Predict\Projectors;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

class PredictServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Predict';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function boot(): void
    {
        parent::boot();
        $router = app('router');
        $this->registerMyMiddleware($router);
        $this->registerRoutes($router);

        $this->registerEventListener();

        Projectionist::addProjectors([
            // Projectors\BetBalanceProjector::class,
            Projectors\ArticleProjector::class,
            // Projectors\OrderProjector::class, //to predict
            // Projectors\ProfileProjector::class, // to predict
            // YetAnotherProjector::class,
        ]);
    }

    protected function registerEventListener(): void
    {
        $this->app->register(EventServiceProvider::class);
    }

    public function registerMyMiddleware(Router $router): void
    {
    }

    public function registerRoutes(Router $router): void
    {
        /*$this->app['router']->group(['prefix' => \Config::get('my-package::prefix')], function ($router) {
         $router->get('my-route', 'MyVendor\MyPackage\MyController@action');
         $router->get('my-second-route', 'MyVendor\MyPackage\MyController@otherAction');
        });
        */
        // XotData::make();
        // dddx($xot->main_module);
        // $xot->update(['main_module'=>'Blog']);
        // $router->get('/', $xot->getHomeController());
    }

    // public function registerCommands(): void
    // {
    //     $this->commands(
    //         [
    //         ]
    //     );
    // }
}
<<<<<<< HEAD
=======
<?php

declare(strict_types=1);

namespace Modules\Predict\Providers;

use Illuminate\Routing\Router;
use Modules\Predict\Projectors;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

class PredictServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'predict';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function boot(): void
    {
        parent::boot();
        $router = app('router');
        $this->registerMyMiddleware($router);
        $this->registerRoutes($router);

        $this->registerEventListener();

        Projectionist::addProjectors([
            // Projectors\BetBalanceProjector::class,
            Projectors\ArticleProjector::class,
            // Projectors\OrderProjector::class, //to predict
            // Projectors\ProfileProjector::class, // to predict
            // YetAnotherProjector::class,
        ]);
    }

    protected function registerEventListener(): void
    {
        $this->app->register(EventServiceProvider::class);
    }

    public function registerMyMiddleware(Router $router): void
    {
    }

    public function registerRoutes(Router $router): void
    {
        /*$this->app['router']->group(['prefix' => \Config::get('my-package::prefix')], function ($router) {
         $router->get('my-route', 'MyVendor\MyPackage\MyController@action');
         $router->get('my-second-route', 'MyVendor\MyPackage\MyController@otherAction');
        });
        */
        // XotData::make();
        // dddx($xot->main_module);
        // $xot->update(['main_module'=>'Blog']);
        // $router->get('/', $xot->getHomeController());
    }

    // public function registerCommands(): void
    // {
    //     $this->commands(
    //         [
    //         ]
    //     );
    // }
}
>>>>>>> cf3ae71 (up):Providers/PredictServiceProvider.php
=======
>>>>>>> origin/dev
