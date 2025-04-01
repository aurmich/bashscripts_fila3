<?php

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $denominazione
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read \Modules\Ptv\Models\Profile|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Employee> $employees
 * @property-read int|null $employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Modules\Ptv\Models\Profile|null $updater
 *
 * @method static \Modules\Incentivi\Database\Factories\WorkgroupFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup whereDenominazione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workgroup whereUpdatedBy($value)
 *
 * @property-read \Modules\Incentivi\Models\EmployeeWorkgroup|null $pivot
 *
 * @mixin \Eloquent
 */
class Workgroup extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['denominazione'];

    public function employees(): BelongsToMany
    {
        // return $this->belongsToMany(Employee::class, 'employee_workgroup');
        return $this->belongsToManyX(Employee::class);
    }

    public function projects(): BelongsToMany
    {
        // return $this->belongsToMany(Project::class);
        return $this->belongsToManyX(Project::class);
    }
}
