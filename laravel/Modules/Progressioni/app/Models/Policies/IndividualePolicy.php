<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Policies;

use Modules\Xot\Models\Policies\XotBasePolicy;

class IndividualePolicy extends XotBasePolicy
{
    public function edit($user, $post): bool
    {
        return false;
    }

    public function update($user, $post): bool
    {
        return false;
    }

    public function show($user, $post): bool
    {
        return false;
    }
}
