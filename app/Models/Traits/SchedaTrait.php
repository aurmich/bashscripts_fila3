<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits;

use Modules\Sigma\Models\Traits\Extras\FunctionExtra;
use Modules\Sigma\Models\Traits\Extras\MassExtra;
use Modules\Sigma\Models\Traits\Mutators\CommonMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrAnnoMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrDateRangeMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteStabiMutator;
use Modules\Sigma\Models\Traits\Mutators\SchedaMutator;
use Modules\Sigma\Models\Traits\Relationships\CommonRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrAnnoRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrDateRangeRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteStabiRelationship;
use Modules\Sigma\Models\Traits\Relationships\TquRelationship;
use Modules\Sigma\Models\Traits\Scopes\CommonScope;

// --- traits ---
/**
 * Modules\Sigma\Models\Traits\SigmaModelTrait.
 *
 * @property float $percparttime
 * @property int $giorni_parttimevert
 * @property int $giorni_presenza
 */
trait SchedaTrait
{
    use CommonMutator;
    use CommonRelationship;
    use CommonScope;
    use EnteMatrAnnoMutator;
    use EnteMatrAnnoRelationship;
    use EnteMatrDateRangeMutator;
    use EnteMatrDateRangeRelationship;
    use EnteMatrMutator;
    use EnteMatrRelationship;
    use EnteStabiMutator;
    use EnteStabiRelationship;
    use FunctionExtra;
    use MassExtra;
    use SchedaMutator;
    use TquRelationship;

    // -------------
}
