<?php

/**
 * @see https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/resources/JobBatchesResource.php?ref_type=heads
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Job\Filament\Resources\JobBatchResource\Pages\ListJobBatches;
use Modules\Job\Models\JobBatch;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Webmozart\Assert\Assert;

class JobBatchResource extends XotBaseResource
{
    // //

    // protected static ?string $model = JobBatch::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';



    public static function getPages(): array
    {
        return [
            'index' => ListJobBatches::route('/'),
        ];
    }


}
