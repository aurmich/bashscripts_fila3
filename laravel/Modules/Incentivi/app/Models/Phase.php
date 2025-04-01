<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Modules\Incentivi\Models\Project;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phase extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'project_id',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'id' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_by' => 'string',
        'updated_by' => 'string',
    ];

    public function settlement(): MorphOne
    {
        return $this->morphOne(Settlement::class, 'model');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
