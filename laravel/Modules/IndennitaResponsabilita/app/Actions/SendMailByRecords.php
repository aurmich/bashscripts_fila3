<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Actions;

use Illuminate\Database\Eloquent\Collection;
use Spatie\QueueableAction\QueueableAction;

class SendMailByRecords
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Collection $records)
    {
        /*
        $records=$records->filters(function($record){
            return $record->ratings->sum('pivot.value') > 0;
        });
        dddx($records);
        */
        foreach ($records as $record) {
            app(SendMailByRecord::class)->execute($record);
        }

        return true;
    }
}
