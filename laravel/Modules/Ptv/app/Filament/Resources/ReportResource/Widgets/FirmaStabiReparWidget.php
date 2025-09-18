<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\ReportResource\Widgets;

use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Alignment;
use Filament\Support\Exceptions\Halt;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\Widget;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Modules\Sigma\Models\Repart;
use Modules\Xot\Datas\XotData;

/**
 * @property ComponentContainer $form
 */
class FirmaStabiReparWidget extends Widget implements HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use InteractsWithPageFilters;

    public ?array $data = [];

    protected static string $view = 'ptv::filament.widgets.firma_stabi_repar';

    protected int|string|array $columnSpan = 'full';

    public string $resource = '';

    public array $listener = [
        'filters-updated' => 'filtersUpdated',
    ];

    public function mount(): void
    {
        $this->filtersUpdated($this->filters ?? []);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('stabi_diri_id'),
                TextInput::make('nome_stabi')
                    ->required(),
                TextInput::make('nome_diri')
                    ->required(),
            ])
            ->columns(2)
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $stabi_repar_class = Str::of($this->resource)->before('\Filament\\')->append('\Models\StabiDirigente')->toString();
            $stabi_repar = $stabi_repar_class::firstWhere(['id' => $data['stabi_diri_id']]);
            $stabi_repar->update($data);
        } catch (Halt $exception) {
            Notification::make()
                ->title('Error !')
                ->body($exception->getMessage())
                ->danger()
                ->send();

            return;
        } catch (\Error $exception) {
            Notification::make()
                ->title('Error !')
                ->body($exception->getMessage())
                ->danger()
                ->send();

            return;
        }

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    /*
    public function areFormActionsSticky(): bool
    {
        return false;
    }

    public function getFormActionsAlignment(): string | Alignment
    {
        return Alignment::Start;
    }
    */
    #[On('filters-updated')]
    public function filtersUpdated(array $filters)
    {
        if ($filters == []) {
        }

        // $this->filters=array_merge($this->filters ?? [],$filters);
        // $livewire->tableFilters

        $data = [];
        /*
        $profile = XotData::make()->getProfileModel();
        if(isset($filters['stabi'])){
            $data['stabi']=$profile?->teams?->firstWhere('id',$filters['stabi'])?->name;
        }
        */
        if (isset($filters['stabi']) && isset($filters['repar']) && isset($filters['anno'])) {
            /*
            $data['repar']=Repart::firstWhere([
                'ente'=>90,
                'stabi'=> $filters['stabi'],
                'repar'=>  $filters['repar'],
            ])->dest1;
            */
            // dddx($this->resource); // => Modules\Performance\Filament\Resources\IndividualeRegionaleResource
            $stabi_repar_class = Str::of($this->resource)->before('\Filament\\')->append('\Models\StabiDirigente')->toString();
            $stabi_repar = $stabi_repar_class::firstOrCreate([
                'stabi' => $filters['stabi'],
                'repar' => $filters['repar'],
                'anno' => $filters['anno'],
            ]);
            $data['stabi_diri_id'] = $stabi_repar->id;
            $data['nome_stabi'] = $stabi_repar->nome_stabi;
            $data['nome_diri'] = $stabi_repar->nome_diri;
        }

        // dddx($this->tableFilters);

        $this->form->fill($data);
    }
}
