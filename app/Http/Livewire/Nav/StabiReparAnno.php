<?php

declare(strict_types=1);

namespace Modules\Ptv\Http\Livewire\Nav;

// use Illuminate\Support\Carbon;
use Livewire\Component;
use Modules\Sigma\Models\Repart;
use Modules\Xot\Actions\GetViewAction;

class StabiReparAnno extends Component
{
    public array $select_opts = [];

    public array $select_opt_subs = [];

    /**
     * Undocumented variable.
     *
     * @var int|string|null
     */
    public $stabi;

    public int $repar;

    /**
     * Year variable.
     *
     * @var int|string|null
     */
    public $year;

    public function mount(array $nav, $year): void
    {
        $opts = $nav['options']->all();
        $opts = collect($opts)->map(static fn ($v, $k): array => ['label' => $v, 'id' => $k])->all();

        // dddx(\Auth::user()->groups);
        $this->select_opts = $opts;
        // dddx($opts);
        $this->year = request()->input('year', $year);
        $this->stabi = (int) request()->input('stabi');
        $this->repar = (int) request()->input('repar');
        $this->setSubSelectStabi($this->stabi);
    }

    public function render()
    {
        // $view = 'ptv::livewire.nav.stabi_repar_anno';
        $view = app(GetViewAction::class)->execute();

        $view_params = [
            'view' => $view,
            'select_opts' => $this->select_opts,
        ];

        return view($view, $view_params);
    }

    public function setSubSelectStabi($stabi): void
    {
        $rows = Repart::where('stabi', $stabi)
            ->where('repar', '!=', 0)
            ->get();
        /*-- perde l'array associativo
        $opts = $rows->map(function ($item) {
            $item['name'] = $item['repar'].'] '.$item['dest1'];

            return $item;
        })->pluck('name', 'repar')->all();
        */
        $opts = $rows->map(static fn (array $item): array => ['label' => $item['repar'].'] '.$item['dest1'], 'id' => $item['repar']])->all();

        $this->select_opt_subs = $opts;
    }

    public function setSubSelect(): void
    {
        $this->setSubSelectStabi($this->stabi);
    }
}
