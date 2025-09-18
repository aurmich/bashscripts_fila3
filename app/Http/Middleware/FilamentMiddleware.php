<?php

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Http\Middleware;
=======
namespace Modules\IndennitaResponsabilita\Http\Middleware;
>>>>>>> e0005d7d (first)
=======
namespace Modules\Prenotazioni\Http\Middleware;
>>>>>>> 4658bb86 (first)

use Exception;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Nwidart\Modules\Laravel\Module;
use Str;

class FilamentMiddleware extends Middleware
{
<<<<<<< HEAD
<<<<<<< HEAD
    public static string $module = 'IndennitaCondizioniLavoro';
=======
    public static string $module = 'IndennitaResponsabilita';
>>>>>>> e0005d7d (first)
=======
    public static string $module = 'Prenotazioni';
>>>>>>> 4658bb86 (first)

    public static string $context = 'filament';

    private function getModule(): Module
    {
        return app('modules')->findOrFail(static::$module);
    }

    /**
     * @throws Exception
     */
    private function getContextName(): string
    {
        $module = $this->getModule();
        if (static::$context === '' || static::$context === '0') {
            throw new Exception('Context has to be defined in your class');
        }

        return Str::of($module->getLowerName())->append('-')->append(Str::slug(static::$context))->kebab()->toString();
    }

    protected function authenticate($request, array $guards): void
    {
        $contextName = $this->getContextName();
        $guardName = config($contextName.'.auth.guard');
        $guard = $this->auth->guard($guardName);

        if (! $guard->check()) {
            $this->unauthenticated($request, $guards);

            return;
        }

        $this->auth->shouldUse($guardName);

        $user = $guard->user();

        if ($user instanceof FilamentUser) {
            abort_if(! $user->canAccessFilament(), 403);

            return;
        }

        abort_if(config('app.env') !== 'local', 403);
    }

    protected function redirectTo($request): string
    {
        $contextName = $this->getContextName();

        return route($contextName.'.auth.login');
    }
}
