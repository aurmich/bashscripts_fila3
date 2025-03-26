<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Sigma\Models\Repart;

trait EnteStabiRelationship
{
    /**
     * ---.
     */
    public function reparts(): HasMany
    {
        return $this->hasMany(Repart::class, 'stabi', 'stabi')
            ->where('ente', $this->ente);
    }
}
