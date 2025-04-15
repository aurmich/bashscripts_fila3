<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;

use Filament\Forms\Components\TextInput;
// use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource;

class SendMailIndennitaResponsabilita extends Page implements HasForms
{
    // use HasRelationManagers;
    // use InteractsWithRecord;
    use InteractsWithForms;

    public array $data = [];

    public array $tableFilters = [];

    protected static string $resource = IndennitaResponsabilitaResource::class;

    protected static string $view = 'indennitaresponsabilita::filament.resources.indennita-responsabilita.pages.send-mail';

    public function __construct()
    {
        // dddx('a');
    }

    public function mount()
    {
        $data = request()->all();
        if (isset($data['anno/valutatore'])) {
            $this->tableFilters = $data['anno/valutatore'];
        }
        // dddx('b');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
            ])
            ->statePath('data');
    }
}
