<?php

namespace Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;

use Filament\Resources\Pages\Page;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource;

class PdfIndennitaResponsabilita extends Page
{
    protected static string $resource = IndennitaResponsabilitaResource::class;

    protected static string $view = 'modules.indennita-responsabilita.filament.resources.indennita-responsabilita-resource.pages.pdf-indennita-responsabilita';
}
