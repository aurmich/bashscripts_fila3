<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Filters;

use Modules\Xot\Datas\XotData;
use Modules\Sigma\Models\Repart;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;

class StabiReparAnnoHaDirittoFilter extends SelectFilter
{
    public static function getDefaultName(): ?string
    {
        return 'stabi_repar_anno';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $profile = XotData::make()->getProfileModel();
        $team_class = XotData::make()->getTeamClass();
        $team_table = app($team_class)->getTable();
        $user=Auth::user();
       
        
        $teams_opts = $user->teams()->pluck($team_table.'.name', $team_table.'.id');
        // $this->label('Filter By Category');

        // $this->placeholder('Select a category to filter');

        // $this->relationship('category', 'name');
        $this->form([
            Select::make('anno')
                ->options([
                    '2023' => '2023',
                ])
                ->reactive(),

            Select::make('stabi')
                ->label('stabi')
                ->options($teams_opts),
            Select::make('repar')
                ->label('repar')
                ->options(function (callable $get, callable $set) {
                    $stabi = $get('stabi');

                    return Repart::where('ente', 90)
                        ->where('repar', '!=', 0)
                        ->where('stabi', $stabi)
                        ->get()
                        ->mapWithKeys(function ($item) {
                            $key = $item->repar;
                            $label = $item->repar.'] '.$item->dest1;

                            return [$key => $label];
                        })
                        ->toArray();
                }),
            Select::make('ha_diritto')
                ->label('diritto ?')
                ->options([null => 'Tutti', '0' => 'no', '1' => 'si']),
            // TernaryFilter::make('ha_diritto'),
        ])
            ->columns(4);

        $this->query(function (Builder $query, array $data, $livewire): Builder {
            if ($data['ha_diritto'] == null) {
                unset($data['ha_diritto']);
            }

            $livewire->dispatch('filters-updated', $data);

            return $query->where($data);
        });

        $this->searchable();
    }
}
