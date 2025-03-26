<?php

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Modules\Incentivi\Filament\Resources\ProjectResource;

class ViewProjectReport extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected static string $view = 'incentivi::filament.pages.projects.view-project-report';

    protected static ?string $title = 'Resoconto';

    protected static ?string $navigationLabel = 'Resoconto';

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('nome'),
                Infolists\Components\TextEntry::make('tipo')
                    ->columnSpanFull(),
            ]);
    }
}
