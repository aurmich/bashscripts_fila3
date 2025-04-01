<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatch('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Http\Livewire\LettF;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\IndennitaResponsabilita\Models\LettF;

class Edit extends Component
{
    public array $form_data;

    public string $date_format = 'd/m/Y';

    // public LettF $row;
    protected $listeners = ['load_values' => '$refresh'];

    public function mount(LettF $lettF): void
    {
        // $this->row = $row;
        // dddx(['dalf' => $row->dalf, 'alf' => $row->alf]);
        $this->form_data = $lettF->toArray();
        $this->form_data['dalf'] = $lettF->dalf->format($this->date_format);
        $this->form_data['alf'] = $lettF->alf->format($this->date_format);

        $this->form_data['importi_categoria'] = $lettF->importi->categoria;
        $this->form_data['importi_min'] = $lettF->importi->min;
        $this->form_data['importi_max'] = $lettF->importi->max;
        // dddx(['dalf' => $row->dalf, 'alf' => $row->alf]);
    }

    public function render(): Renderable
    {
        // $view = 'indennitaresponsabilita::livewire.lett_f.edit';
        $view = app(GetViewAction::class)->execute();
        $view_params = [];

        return view($view, $view_params);
    }

    public function update(): void
    {
        $data = $this->validate();
        $data = $data['form_data'];

        $row = LettF::find($this->form_data['id']);
        $row->update($data);

        session()->flash('message', ' successfully updated.['.now().']');
    }

    public function totalePunteggioAttribuito(): int|float
    {
        return $this->form_data['complessita'] + $this->form_data['coordinamento'] + $this->form_data['responsabilita'];
    }

    public function valoreEconomicoCalcolato(): int|float
    {
        return $this->totalePunteggioAttribuito() * $this->form_data['importi_max'] / 100;
    }

    public function valoreEconomicoAttribuito()
    {
        if ($this->valoreEconomicoCalcolato() > $this->form_data['importi_min']) {
            return $this->valoreEconomicoCalcolato();
        }

        if ($this->totalePunteggioAttribuito() == 0) {
            return 0;
        }

        return $this->form_data['importi_min'];
    }

    public function valoreEconomicoEffettivo(): int|float
    {
        if ($this->totalePunteggioAttribuito() == 0) {
            return 0;
        }

        $dal = Carbon::createFromFormat($this->date_format, $this->form_data['dalf']);
        $al = Carbon::createFromFormat($this->date_format, $this->form_data['alf']);
        $gg = $dal->diffInDays($al, true) + 1;
        $tot_gg = 365 + $dal->format('L');

        return $this->valoreEconomicoAttribuito() * $gg / $tot_gg;
    }
}
