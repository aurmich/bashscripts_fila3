<?php

namespace Modules\Ptv\Filament\Resources\ReportResource\Pages;

use Filament\Resources\Pages\Page;
use Modules\Performance\Filament\Resources\IndividualeDipResource;
use Modules\Xot\Actions\GetViewAction;

class FillOutTheForm extends Page
{
    public static function getResource(): string
    {
        return IndividualeDipResource::class;
    }

    public function getView(): string
    {
        $resource = static::getResource();
        $view = app(GetViewAction::class)->execute();
        dddx($view);

        return 'aaa';
    }
}
