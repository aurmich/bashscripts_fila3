<?php

declare(strict_types=1);

namespace Modules\Ptv\Http\Livewire;

// use Illuminate\Support\Carbon;
use Livewire\Component;
use Modules\Xot\Actions\GetViewAction;
use Nwidart\Modules\Facades\Module;

class EditFirma extends Component
{
    public ?int $stabi = null;

    public ?int $repar = null;

    public ?int $year = null;

    public string $module_name;

    public ?string $nome_stabi = null;

    public ?string $nome_diri = null;

    public ?string $stabi_diri = null;

    public function mount(string $module_name): void
    {
        $this->year = (int) request()->input('year');
        $this->stabi = (int) request()->input('stabi');
        $this->repar = (int) request()->input('repar');
        $this->module_name = $module_name;

        /*
        $stabi_diri = $this->stabi_diri;


        if (is_object($stabi_diri)) {
            $this->nome_stabi = $stabi_diri->nome_stabi;
            $this->nome_diri = $stabi_diri->nome_diri;
        }
        */
        $stabi_diri = $this->getStabiDiri();
        if (\is_object($stabi_diri)) {
            $this->nome_diri = $stabi_diri->nome_diri;
            $this->nome_stabi = $stabi_diri->nome_stabi;
        }
    }

    // Computed Property
    public function getStabiDiri()
    {
        if ($this->stabi === null) {
            return null;
        }

        $mod = Module::find($this->module_name);
        $mod_name = $mod->getName();
        $stabi_diri_class = '\Modules\\'.$mod_name.'\Models\StabiDirigente';
        $stabi_diri_obj = app($stabi_diri_class);

        /*
        $stabi_diri = $stabi_diri_obj
            ->where('stabi', $this->stabi)
            ->where('repar', $this->repar)
            ->where('anno', $this->year)
            ->first();
        if (! is_object($stabi_diri)) {
            $stabi_diri = $stabi_diri_obj
                ->where('stabi', $this->stabi)
                ->where('repar', $this->repar)
                ->orderByDesc('anno')
                ->first();
            $nome_diri = '';
            $nome_stabi = '';
            if (is_object($stabi_diri)) {
                $nome_diri = $stabi_diri->nome_diri;
                $nome_stabi = $stabi_diri->nome_stabi;
            }
            $stabi_diri = $stabi_diri_obj
            ->create([
                'stabi' => $this->stabi,
                'repar' => $this->repar,
                'anno' => $this->year,
                'nome_diri' => $nome_diri,
                'nome_stabi' => $nome_stabi,
            ]);
            //dddx($stabi_diri);
        }
        */
        // $this->nome_diri = $stabi_diri->nome_diri;
        // $this->nome_stabi = $stabi_diri->nome_stabi;

        return $stabi_diri_obj->firstOrCreate(
            [
                'stabi' => $this->stabi,
                'repar' => $this->repar,
                'anno' => $this->year,
            ]
        );
    }

    public function render()
    {
        // $view = 'ptv::livewire.edit-firma';
        $view = app(GetViewAction::class)->execute();
        // $stabi_diri = $this->getStabiDiri();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function update(): void
    {
        $stabi_diri = $this->getStabiDiri();
        $stabi_diri->update([
            'nome_stabi' => $this->nome_stabi,
            'nome_diri' => $this->nome_diri,
        ]);

        session()->flash('message', 'Updated Successfully.');
    }
}
