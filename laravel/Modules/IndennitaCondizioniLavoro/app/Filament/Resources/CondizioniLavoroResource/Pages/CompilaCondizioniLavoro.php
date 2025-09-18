<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Filament\Forms\ComponentContainer;
use Illuminate\Support\Facades\Notification;
use Filament\Resources\Pages\Page as ResourcePage;
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseResourcePage;
use Filament\Notifications\Notification as FilamentNotification;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource;

/**
 * Undocumented class
 * @property ComponentContainer $form
 */
class CompilaCondizioniLavoro extends XotBaseResourcePage
{
    use HasRelationManagers;
    use InteractsWithRecord;

    protected static string $resource = CondizioniLavoroResource::class;

    protected static string $view = 'indennitacondizionilavoro::admin.condizioni_lavoro.compila.page';

    public array $form_data = [

    ];

    public array $rules = [
        'form_data.tot_gg' => 'numeric',
        'form_data.dettaglio.*.pivot.gg' => 'lte:form_data.tot_presenza_periodo_plus_no_timbr',
    ];

    public array $messages = [
        'form_data.tot_presenza_periodo_plus_no_timbr.gte' => ':attribute: DEVONO ESSERE MAGGIORNI DELLA SOMMA DEI GIORNI DEI PERIODI',
    ];

    public array $validationAttributes = [
        'form_data.tot_presenza_periodo_plus_no_timbr' => 'Giorni Complessivi',
    ];

    public string $previousUrl;

    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();
    }

    private function authorizeAccess(): void
    {
        static::authorizeResourceAccess();
        if (! Gate::allows('compila', $this->record)) {
            abort(403);
        }
    }

    private function fillForm(): void
    {
        $this->callHook('beforeFill');

        $data = $this->getRecord()->attributesToArray();

        if ($this->getRecord()->anno >= 2023) {
            $q = $this->getRecord()->quadrimestre;
            $dal = Carbon::parse($this->getRecord()->anno.'-01-01')->addMonths(4 * ($q - 1));
            $al = Carbon::parse($this->getRecord()->anno.'-01-01')->addMonths(4 * $q)->subDays(1);
            $res = tap($this->getRecord())->update(['dal' => $dal, 'al' => $al]);
        }

        $data = $this->mutateFormDataBeforeFill($data);

        $this->form->fill($data);

        $this->callHook('afterFill');

        $this->form_data['dettaglio'] = $this->getRecord()->indennitaTipoDettaglio->keyBy('id')->toArray();
        $this->form_data['tot_presenza_periodo_plus_no_timbr'] = $this->getRecord()->tot_presenza_periodo_plus_no_timbr;
    }

    protected function getViewData(): array
    {
        $this->form_data['tot_gg'] = collect($this->form_data['dettaglio'])
            ->reduce(static fn ($tot_gg, $item): float|int => $tot_gg + (int) $item['pivot']['gg'], 0);
        $this->form_data['tot_euro'] = collect($this->form_data['dettaglio'])
            ->reduce(static fn ($tot_euro, $item): float|int => $tot_euro + ($item['euro_giorno'] * (int) $item['pivot']['gg']), 0);

        return [];
    }

    private function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    public function save(): void
    {
        $this->validate();
        $this->getRecord()->update([
            'tot_presenza_periodo_plus_no_timbr' => $this->form_data['tot_presenza_periodo_plus_no_timbr'],
            'tot' => $this->form_data['tot_euro'],
        ]);
        foreach ($this->form_data['dettaglio'] as $pivot_id => $dettaglio) {
            $pivot_data = ['gg' => $dettaglio['pivot']['gg']];
            $this->getRecord()->indennitaTipoDettaglio()->updateExistingPivot($pivot_id, $pivot_data);
        }

        FilamentNotification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    public function back(): void
    {
        redirect()->to($this->previousUrl);
    }
}
