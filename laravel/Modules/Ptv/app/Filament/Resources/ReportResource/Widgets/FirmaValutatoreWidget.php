<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\ReportResource\Widgets;

use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Filament\Actions\Action;
use Filament\Widgets\Widget;
use Modules\Xot\Datas\XotData;
use Modules\Sigma\Models\Repart;
use Filament\Forms\Components\Hidden;
use Filament\Support\Enums\Alignment;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

/**
 * @property ComponentContainer $form
 */
class FirmaValutatoreWidget extends XotBaseWidget  
{
    
    public ?string $valutatore_id='';
    public ?string $anno='';

    public ?array $data = [];

    protected static string $view = 'ptv::filament.widgets.firma_valutatore';

    public string $resource = '';

    public ?Model $record = null;
 
    

    public function mount(): void
    {
        $this->filtersUpdated($this->filters ?? []);
    }

    public function getFormSchema(): array
    {
        return [
               
                TextInput::make('nome_diri')
                    ->label('Firma')
                    ->required(),
            ];
    }

    /*
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
    */

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $this->record?->update($data);
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


     public function updateFilters(array $newFilters)
    {
        dddx($newFilters);
    }

    #[On('valutatoreIdUpdated')]
    public function valutatoreIdUpdated(array $filters)
    {
        if ($filters == []) {
            $this->form->fill([]);
        }
        $this->valutatore_id = Arr::get($filters,'valutatore_id',null);
        $stabi_repar_class = Str::of($this->resource)->before('\Filament\\')->append('\Models\StabiDirigente')->toString();
        $where=['id'=>$this->valutatore_id];
        $record=$stabi_repar_class::firstWhere($where);

        $data['nome_diri']=$record?->nome_diri;
        $this->record = $record;
        $this->form->fill($data);
    }

    #[On('filters-updated')]
    public function filtersUpdated(array $filters)
    {
        
        if ($filters == []) {
            $this->form->fill([]);
        }

        // $this->filters=array_merge($this->filters ?? [],$filters);
        // $livewire->tableFilters

        $data = [];
        $this->anno = Arr::get($filters,'anno',null);
        $this->valutatore_id = Arr::get($filters,'valutatore_id',null);

        $stabi_repar_class = Str::of($this->resource)->before('\Filament\\')->append('\Models\StabiDirigente')->toString();
        $where=['id'=>$this->valutatore_id];
        $record=$stabi_repar_class::firstWhere($where);

        $data['nome_diri']=$record?->nome_diri;
        $this->record = $record;
        $this->form->fill($data);
    }
}
