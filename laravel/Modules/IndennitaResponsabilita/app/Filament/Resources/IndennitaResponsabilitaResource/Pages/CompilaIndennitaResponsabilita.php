<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;

use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
// use Filament\Pages\Page; //route not exists
// use Filament\Pages\Contracts\HasFormActions;
// use Filament\Resources\Pages\Concerns\HasRecordBreadcrumb;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
// use Filament\Resources\Pages\Concerns\UsesResourceForm;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource;
use Modules\IndennitaResponsabilita\Models\Rating;

// Undefined variable $record

// class CompilaCondizioniLavoro extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord {
/**
 * @property ComponentContainer $form
 */
class CompilaIndennitaResponsabilita extends Page implements HasForms
{
    /* implements HasFormActions */
    // use HasRecordBreadcrumb;
    use HasRelationManagers;
    // use UsesResourceForm;
    use InteractsWithForms;

    use InteractsWithRecord;

    protected static string $resource = IndennitaResponsabilitaResource::class;

    protected static string $view = 'indennitaresponsabilita::filament.resources.indennita-responsabilita.pages.compila';

    public array $form_data = [];

    public array $rules;

    // public array $rules = [
    // 'form_data.tot_gg' => 'numeric',
    // 'form_data.tot_presenza_periodo_plus_no_timbr' => 'gte:form_data.tot_gg',
    // 'form_data.tot_presenza_periodo_plus_no_timbr' => 'required',
    //    'form_data.ratings.*.pivot.value' => 'numeric|between:0,5',
    // ];

    /*
    protected function getFormSchema(): array {
        return [
            Section::make()->schema([
                Forms\Components\DatePicker::make('dal'),
                Forms\Components\DatePicker::make('al'),
            ])->columns(3),
        ];
    }
    */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\DatePicker::make('dal'),
                    Forms\Components\DatePicker::make('al'),
                ])->columns(3),
            ])
            ->statePath('form_data');
    }

    public function getRules(): array
    {
        $rules = $this->getRecord()->getRatingsRules('form_data.ratings.', '.pivot.value');
        $rules['form_data.dal'] = 'date';
        $rules['form_data.al'] = 'date';

        return $rules;
    }

    public array $messages = [
        // 'form_data.tot_presenza_periodo_plus_no_timbr.gte' => ':attribute: DEVONO ESSERE MAGGIORNI DELLA SOMMA DEI GIORNI DEI PERIODI',
    ];

    /*
    public array $validationAttributes = [
        // 'form_data.tot_presenza_periodo_plus_no_timbr' => 'Giorni Complessivi',
        'form_data.ratings.3.pivot.value' => 'zibibbo',
    ];
    */
    public function getValidationAttributes(): array
    {
        $validationAttributes = $this->getRecord()->getRatingsValidationAttributes('form_data.ratings.', '.pivot.value');

        return $validationAttributes;
    }

    public function getView(): string
    {
        $class = __CLASS__;
        $module = Str::between($class, 'Modules\\', '\Filament');

        $after = explode('\\', Str::after($class, '\Filament\\'));
        $after[1] = Str::before($after[1], 'Resource');
        $after[3] = Str::before($after[3], $after[1]);

        $after = collect($after)->map(function ($item) {
            return Str::kebab($item);
            // return Str::snake($item);
        })->implode('.');
        $view = Str::lower($module).'::filament.'.$after;
        if (! view()->exists($view)) {
            throw new \Exception('view ['.$view.'] not Exists  !!');
        }

        return $view;
    }

    /*
    protected function getActions(): array {
        return [
            Actions\DeleteAction::make(),
        ];
    }*/
    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();
        static::$view = $this->getView();

        // $this->rules= $this->getRecord()->getRatingsRules('form_data.ratings.');
        // $this->rules = $this->getRecord()->getRatingsRules('form_data.ratings.', '.pivot.value');
        $this->rules = $this->getRules();
    }

    private function authorizeAccess(): void
    {
        static::authorizeResourceAccess();
        // dddx(Filament::auth()->user());
        // abort_unless(static::getResource()::canEdit($this->getRecord()), 403);
        if (! Gate::allows('compila', $this->record)) {
            abort(403);
        }
    }

    private function fillForm(): void
    {
        $this->callHook('beforeFill');

        $data = $this->getRecord()->attributesToArray();
        $anno = $this->getRecord()->anno;
        if (null == $data['dal']) {
            $data['dal'] = Carbon::parse($anno.'-01-01');
        }

        if (null == $data['al']) {
            $data['al'] = Carbon::parse($anno.'-12-31');
        }

        /*
        if ($this->getRecord()->anno >= 2023) {
            $q = $this->getRecord()->quadrimestre;
            $dal = Carbon::parse($this->getRecord()->anno.'-01-01')->addMonths(4 * ($q - 1));
            $al = Carbon::parse($this->getRecord()->anno.'-01-01')->addMonths(4 * $q)->subDays(1);
            $res = tap($this->getRecord())->update(['dal' => $dal, 'al' => $al]);
            // dddx($res);
        }
        */
        $data = $this->mutateFormDataBeforeFill($data);

        $this->form->fill($data);

        $this->callHook('afterFill');
        $this->form_data['ratings'] = $this->getRecord()->getRatings()->toArray();

        // $this->form_data['dettaglio'] = $this->getRecord()->indennitaTipoDettaglio?->keyBy('id')->toArray();
        // $this->form_data['tot_presenza_periodo_plus_no_timbr'] = $this->getRecord()->tot_presenza_periodo_plus_no_timbr;
    }

    protected function getViewData(): array
    {
        /*
        $this->form_data['tot_gg'] = collect($this->form_data['dettaglio'])
        ->filter(function ($item) {
            // return is_numeric($item);
            return true;
        })
        ->sum('pivot.gg');
        */
        /*
        $this->form_data['tot_gg'] = collect($this->form_data['dettaglio'])
              ->reduce(static fn ($tot_gg, $item): float|int => $tot_gg + (int) $item['pivot']['gg'], 0);
        $this->form_data['tot_euro'] = collect($this->form_data['dettaglio'])
            ->reduce(static fn ($tot_euro, $item): float|int => $tot_euro + ($item['euro_giorno'] * (int) $item['pivot']['gg']), 0);
        */
        $anno = $this->record->anno;

        // *
        $rows = Rating::withExtraAttributes(['anno' => $anno])->get();

        $tot = $rows
            ->where('is_disabled', '!=', true)
            ->where('is_readonly', '!=', true)
            ->reduce(
                function ($tot, $row) {
                    $fieldname = 'ratings.'.$row->id.'.pivot.value';

                    return $tot += intval(Arr::get($this->form_data, $fieldname, 0));
                }, 0
            );

        $tot_id = $rows->firstWhere('title', 'tot')->id;

        Arr::set($this->form_data, 'ratings.'.$tot_id.'.pivot.value', $tot);
        // --------------------------------------------------------------------------------------------------------
        $imp_mese_calcolato_id = $rows->firstWhere('title', 'importo mensile calcolato')->id;

        $imp_mese_calcolato = $tot * 10;

        Arr::set($this->form_data, 'ratings.'.$imp_mese_calcolato_id.'.pivot.value', $imp_mese_calcolato);
        // ---------------------------------------------------------------------------------------------------------

        $imp_mese_attribuito_id = $rows->firstWhere('title', 'importo mensile attribuito')->id;

        $imp_mese_attribuito = $imp_mese_calcolato * $this->getRecord()->perc_p_time_year;

        Arr::set($this->form_data, 'ratings.'.$imp_mese_attribuito_id.'.pivot.value', $imp_mese_attribuito);
        // -----------------------------------------------------------------------------------------------------------

        $imp_anno_attribuito_id = $rows->firstWhere('title', 'importo annuale attribuito')->id;
        // dddx(get_class($this->getRecord()));
        $anno = $this->getRecord()->anno;
        $dal = $this->getRecord()->dal;
        $al = $this->getRecord()->al;
        if (null == $dal) {
            $dal = Carbon::parse($anno.'-01-01');
        }
        if (null == $al) {
            $al = Carbon::parse($anno.'-12-31');
        }
        // $days= 365 + $dal->format('L');
        $days = $dal->daysInYear;
        $perc = ($dal->diffInDays($al, true) + 1) / $days;

        $imp_anno_attribuito = $imp_mese_attribuito * 12 * $perc;

        Arr::set($this->form_data, 'ratings.'.$imp_anno_attribuito_id.'.pivot.value', $imp_anno_attribuito);

        // $this->form_data['ratings.9.pivot.value']=99;
        // dddx($this->form_data);
        return [];
    }

    private function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    public function save(): void
    {
        // dddx([
        // 'dal' => $this->form->dal,
        // 'getRawState' => $this->form->getRawState(),
        // 'getStateOnly' => $this->form->getStateOnly(['dal', 'al']),
        //    'methods' => get_class_methods($this->form),
        // ]);
        // dddx($this->form->getState()); // No property found for validation: [dal]
        // dddx($this->form_data);
        // dddx($this->rules);
        $rules = $this->getRules();

        $validatedData = $this->validate($rules);
        // ddx(get_class_methods($this->form));

        /*
        $this->getRecord()->update([
            'tot_presenza_periodo_plus_no_timbr' => $this->form_data['tot_presenza_periodo_plus_no_timbr'],
            'tot' => $this->form_data['tot_euro'],
        ]);
        foreach ($this->form_data['dettaglio'] as $pivot_id => $dettaglio) {
            $pivot_data = ['gg' => $dettaglio['pivot']['gg']];
            $this->getRecord()->indennitaTipoDettaglio()->updateExistingPivot($pivot_id, $pivot_data);
        }
        */

        $up = collect($this->form_data)->only(['dal', 'al'])->toArray();

        $this->getRecord()->update($up);

        foreach ($this->form_data['ratings'] as $rating) {
            $pivot_id = $rating['id'];
            $pivot_data = collect($rating['pivot'])->only(['value'])->toArray();
            $this->getRecord()->ratings()->updateExistingPivot($pivot_id, $pivot_data);
        }

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    public function back(): void
    {
        $this->redirect(static::$resource::getUrl('index'));
    }
}
