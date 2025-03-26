<?php

namespace Modules\Ptv\Filament\Filters;

use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sigma\Models\Repart;
use Modules\Xot\Datas\XotData;

class StabiReparAnnoFilter extends SelectFilter
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

        $teams_opts = $profile->teams()->pluck($team_table.'.name', $team_table.'.id');
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

        ])
            ->columns(4);

        $this->query(function (Builder $query, array $data): Builder {
            return $query->where($data);
        });

        $this->searchable();
    }
}
