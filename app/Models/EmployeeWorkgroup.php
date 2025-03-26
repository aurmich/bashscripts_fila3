<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property int $employee_id
 * @property int $workgroup_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Modules\Ptv\Models\Profile|null $creator
 * @property \Modules\Ptv\Models\Profile|null $updater
 * @property int|null $project_id
 * @property-read \Modules\Incentivi\Models\Employee|null $employee
 * @property-read \Modules\Incentivi\Models\Project|null $project
 * @property-read \Modules\Incentivi\Models\Workgroup|null $workgroup
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeWorkgroup whereWorkgroupId($value)
 *
 * @mixin \Eloquent
 */
class EmployeeWorkgroup extends BasePivot
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'workgroup_id', 'project_id'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function workgroup(): BelongsTo
    {
        return $this->belongsTo(Workgroup::class, 'workgroup_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
