<?php

declare(strict_types=1);

namespace Modules\Sigma\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getSubheading(): string|Htmlable|null
    {
        return 'Here you will see an overview of your tasks.';
    }

    public function getWidgets(): array
    {
        return [
            // ...
        ];
    }
}
