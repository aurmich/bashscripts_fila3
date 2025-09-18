<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\Providers;
=======
namespace Modules\Xot\Providers;
>>>>>>> 59bc4fe7 (first)
=======
namespace Modules\UI\Providers;
>>>>>>> a8f30311 (first)
=======
namespace Modules\Lang\Providers;
>>>>>>> bbec4378 (first)
=======
namespace Modules\Job\Providers;
>>>>>>> c088001a (first)
=======
namespace Modules\Notify\Providers;
>>>>>>> d79d9e57 (first)
=======
/**
 * Provides event handling configuration for the Setting module.
 *
 * This class extends the base event service provider and configures the event
 * handling for the Setting module. It indicates that events should be
 * discovered, but does not define any specific event listeners.
 */

declare(strict_types=1);

namespace Modules\Setting\Providers;
>>>>>>> 9cec72d6 (first)
=======
declare(strict_types=1);

namespace Modules\Rating\Providers;
>>>>>>> 2df6fbc8 (first)
=======
declare(strict_types=1);

namespace Modules\Media\Providers;
>>>>>>> c986cc10 (first)
=======
declare(strict_types=1);

namespace Modules\Tenant\Providers;
>>>>>>> 8fc3049b (first)

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;

class EventServiceProvider extends BaseEventServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [];
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 9cec72d6 (first)
=======

>>>>>>> 2df6fbc8 (first)
=======

>>>>>>> c986cc10 (first)
=======

>>>>>>> 8fc3049b (first)
    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected function configureEmailVerification(): void
    {
    }
=======
    protected function configureEmailVerification(): void {}
>>>>>>> c088001a (first)
=======
    protected function configureEmailVerification(): void
    {
    }
>>>>>>> d79d9e57 (first)
=======
namespace Modules\User\Providers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\User\Listeners\FailedLoginListener;
use Modules\User\Listeners\LoginListener;
use Modules\User\Listeners\LogoutListener;
use Modules\User\Listeners\OtherDeviceLogoutListener;
use SocialiteProviders\Auth0\Auth0ExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        SocialiteWasCalled::class => [
            Auth0ExtendSocialite::class,
        ],
        Login::class => [
            LoginListener::class,
        ],
        Logout::class => [
            LogoutListener::class,
        ],
        Failed::class => [
            FailedLoginListener::class,
        ],
        OtherDeviceLogout::class => [
            OtherDeviceLogoutListener::class,
        ],
    ];
>>>>>>> 0d55b583 (first)
=======
    protected function configureEmailVerification(): void
    {
        // ...
    }
>>>>>>> 9cec72d6 (first)
=======
    protected function configureEmailVerification(): void
    {
    }
>>>>>>> 2df6fbc8 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> c986cc10 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 8fc3049b (first)
}
