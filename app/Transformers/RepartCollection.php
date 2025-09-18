<?php

declare(strict_types=1);

namespace Modules\Sigma\Transformers;

use Illuminate\Http\Request;
use Modules\Xot\Filament\Resources\XotBaseResourceCollection;

class RepartCollection extends XotBaseResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     */
    public function toArray($request): array
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection, // non si puo' cambiare il nome della var data
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
