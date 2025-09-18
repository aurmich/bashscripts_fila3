<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Modules\Xot\Datas\XotData;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Models\Traits\RelationX;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait IsTenant
{
    use RelationX;
    /**
     * Get all users associated with this tenant.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract, $this>
     */
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
        /** @var class-string<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract> $userClass */
        $userClass = $xot->getUserClass();

        return $this->belongsToManyX($userClass, 'tenant_user', 'tenant_id', 'user_id');
    }

   
}
