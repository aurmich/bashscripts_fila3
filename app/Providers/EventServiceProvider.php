<?php

declare(strict_types=1);

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

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;

class EventServiceProvider extends BaseEventServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [];

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
    protected function configureEmailVerification(): void
    {
    }
=======
    protected function configureEmailVerification(): void {}
>>>>>>> c088001a (first)
}
