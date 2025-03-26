<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Illuminate\Database\Eloquent\Model;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait IsTenant
{
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

        return $this->belongsToMany($userClass, 'tenant_user', 'tenant_id', 'user_id');
    }

    /**
     * Method to create a belongsToMany relationship.
     * 
     * @param class-string<\Illuminate\Database\Eloquent\Model> $related The related model class
     * @param string|null $table The pivot table name
     * @param string $foreignPivotKey The foreign key in pivot table
     * @param string $relatedPivotKey The related key in pivot table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model, $this>
     */
    public function belongsToManyX(string $related, ?string $table = null, ?string $foreignPivotKey = 'tenant_id', ?string $relatedPivotKey = 'user_id', ?string $parentKey = null, ?string $relatedKey = null, ?string $relation = null): BelongsToMany
    {
        return $this->belongsToMany($related, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relation);
    }
}
