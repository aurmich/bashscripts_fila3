<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Policies;

use Modules\Xot\Models\Policies\XotBasePolicy;

class PerformanceFondoPolicy extends XotBasePolicy
{
    public function distribuisciSoldiIndividuale($user, $post): bool
    {
        return true;
    }

    public function distribuisciSoldiOrganizzativa($user, $post): bool
    {
        return true;
    }

    public function xlsSoldiIndividuale($user, $post): bool
    {
        return true;
    }

    public function xlsSoldiOrganizzativa($user, $post): bool
    {
        return true;
    }
}
