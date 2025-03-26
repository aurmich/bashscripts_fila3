<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Settlement extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'denominazione',
        'tipologia',
        'importo',
        'model_id',
        'model_type',
        'project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function linkable(): MorphTo
    {
        return $this->morphTo('model');
    }
}
