<?php

declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Models\Panels;

use Modules\Cms\Models\Panels\XotBasePanel;

class _ModulePanel extends XotBasePanel {
    public function actions(): array {
        return [
            //   new Actions\TestAction(),
        ];
    }
}
