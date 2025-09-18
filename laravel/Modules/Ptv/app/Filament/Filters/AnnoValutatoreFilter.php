<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Filters;

use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\Ptv\Actions\GetValutatoriOptions;

class AnnoValutatoreFilter extends Filter
{
    public static function getDefaultName(): ?string
    {
        return 'anno_valutatore';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $trace = debug_backtrace();
        $caller = $trace[4]['class'];
        $module_name = Str::of($caller)->between('Modules\\', '\Filament\\')->toString();

        $current_year = intval(date('Y'));
        $years = range($current_year - 2, $current_year);
        $years = array_combine($years, $years);
        $this->form([
            Select::make('anno')
                ->options($years)
                ->reactive(),

            Select::make('valutatore_id')
                ->label('valutatore')
                ->options(static fn (callable $get, callable $set) => app(GetValutatoriOptions::class)
                    ->execute($module_name, $get('anno')))
                //->live(onBlur: true)
                ->reactive()
                ->afterStateUpdated(function (?string $state, ?string $old,$livewire) {
                    /*
                    //$livewire
                    dddx([
                        $livewire->getTableFilters(),
                        //$livewire->getTableFilters()->getState(),
                        $livewire,
                        'state' => $state,
                    ]);
                    */
                    $livewire->dispatch('valutatoreIdUpdated',['valutatore_id' => $state]);
                }),
               
                 
            // TernaryFilter::make('is_admin'),

            Select::make('ha_diritto')
                ->label('diritto ?')
                ->options([null => 'Tutti', '0' => 'no', '1' => 'si']),
        ])
        ->query(static function (Builder $query, array $data) {
            if (null == $data['anno']) {
                return $query->where('id', 0);
            }
            if (null == $data['valutatore_id'] && profile()->isSuperAdmin()) {
                unset($data['valutatore_id']);
            }

            if (isset($data['valutatore_id']) && null == $data['valutatore_id']) {
                return $query->where('id', 0);
            }
            // *
            if (isset($data['ha_diritto']) && null == $data['ha_diritto']) {
                unset($data['ha_diritto']);
            }
            // */
            // $data = array_filter($data);

            // app(Populate::class)->execute($data);
            // app(FixValutatoreIdByAnno::class)->execute('IndennitaCondizioniLavoro', 'CondizioniLavoro', $data['anno']);

            $query = $query->where($data);

            return $query;
        })
        ->columns(3)
        ;
    }
}
