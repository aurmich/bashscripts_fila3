<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
declare(strict_types=1);

namespace Modules\Badge\Providers;
>>>>>>> 7e417e87 (first)
=======
declare(strict_types=1);

namespace Modules\CertFisc\Providers;
>>>>>>> 53542950 (first)
=======
declare(strict_types=1);

namespace Modules\ContoAnnuale\Providers;
>>>>>>> 26424c5e (first)
=======
declare(strict_types=1);

namespace Modules\Europa\Providers;
>>>>>>> c8cd1ec3 (first)
=======
declare(strict_types=1);

namespace Modules\Inail\Providers;
>>>>>>> 51c7727d (first)
=======
declare(strict_types=1);

namespace Modules\Incentivi\Providers;
>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Providers;
>>>>>>> b7483fd0 (first)
=======
declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Providers;
>>>>>>> e0005d7d (first)
=======
declare(strict_types=1);

namespace Modules\Legge104\Providers;
>>>>>>> 6907d18e (first)
=======
declare(strict_types=1);

namespace Modules\Legge109\Providers;
>>>>>>> 616a71c2 (first)
=======
declare(strict_types=1);

namespace Modules\Mensa\Providers;
>>>>>>> c6af2eee (first)
=======
declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Providers;
>>>>>>> 8e6e7d4c (first)
=======
declare(strict_types=1);

namespace Modules\Prenotazioni\Providers;
>>>>>>> 4658bb86 (first)
=======
declare(strict_types=1);

namespace Modules\PresenzeAssenze\Providers;
>>>>>>> edbb3aab (first)
=======
declare(strict_types=1);

namespace Modules\Progressioni\Providers;
>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);

namespace Modules\Questionari\Providers;
>>>>>>> fec698af (first)
=======
declare(strict_types=1);

namespace Modules\Sigma\Providers;
>>>>>>> f862c51f (first)
=======
declare(strict_types=1);

namespace Modules\Sindacati\Providers;
>>>>>>> 9997d18c (first)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======

>>>>>>> 7e417e87 (first)
=======

>>>>>>> 53542950 (first)
=======

>>>>>>> 26424c5e (first)
=======

>>>>>>> c8cd1ec3 (first)
=======

>>>>>>> 51c7727d (first)
=======

>>>>>>> 15ea09e2 (first)
=======

>>>>>>> b7483fd0 (first)
=======

>>>>>>> e0005d7d (first)
=======

>>>>>>> 6907d18e (first)
=======

>>>>>>> 616a71c2 (first)
=======

>>>>>>> c6af2eee (first)
=======

>>>>>>> 8e6e7d4c (first)
=======

>>>>>>> 4658bb86 (first)
=======

>>>>>>> edbb3aab (first)
=======

>>>>>>> bcab6efe (first)
=======

>>>>>>> fec698af (first)
=======

>>>>>>> f862c51f (first)
=======

>>>>>>> 9997d18c (first)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 7e417e87 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 53542950 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 26424c5e (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> c8cd1ec3 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 51c7727d (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 15ea09e2 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> b7483fd0 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> e0005d7d (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 6907d18e (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 616a71c2 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> c6af2eee (first)
=======
    protected function configureEmailVerification(): void
    {
    }
>>>>>>> 8e6e7d4c (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 4658bb86 (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> edbb3aab (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> bcab6efe (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> fec698af (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> f862c51f (first)
=======
    protected function configureEmailVerification(): void {}
>>>>>>> 9997d18c (first)
}
