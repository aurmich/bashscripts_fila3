<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Jenssegers\Agent\Agent;
use Modules\User\Models\Device;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentDeviceAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): ?Device
    {
        $agent = new Agent();
        $deviceType = $agent->device();
        
        if ($deviceType === false || $deviceType === null) {
            return null;
        }

        return Device::firstOrCreate([
            'name' => $deviceType,
            'type' => $agent->deviceType(),
            'platform' => $agent->platform(),
            'browser' => $agent->browser(),
        ]);
    }
}
