<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Ptv\Filament\Widgets\AdminWidgets;

class Dashboard extends BasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'ptv::filament.pages.dashboard';
    public function getSubheading(): string|Htmlable|null
    {
        // if (auth()->user()->is_admin) {
        //    return '--';
        // }

        return 'Here you will see an overview of your tasks.';
    }

    public function getWidgets(): array
    {
        return [
            AdminWidgets::class,
        ];
    }
}
