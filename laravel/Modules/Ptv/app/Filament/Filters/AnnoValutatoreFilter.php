<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Filters;

use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
use Modules\Sigma\Models\Repart;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
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
        $years=range($current_year-2, $current_year);
        $years=array_combine($years, $years);
        $this->form([
            Select::make('anno')
                ->options($years)
                ->reactive(),
            
            Select::make('valutatore_id')
                ->label('valutatore')
                ->options(static fn (callable $get, callable $set) => app(GetValutatoriOptions::class)
                    ->execute($module_name, $get('anno'))),
            Select::make('ha_diritto')
                ->label('diritto ?')
                ->options([null => 'Tutti', '0' => 'no', '1' => 'si']),
        ])
        ->query(static function (Builder $query, array $data) {
            
            if ($data['anno'] == null) {
                return $query->where('id', 0);
            }
            if ($data['valutatore_id'] == null && profile()->isSuperAdmin()) {
                unset($data['valutatore_id']);
            }
           
            if (isset($data['valutatore_id']) && $data['valutatore_id'] == null) {
                return $query->where('id', 0);
            }
           
            
           
            //app(Populate::class)->execute($data);
            //app(FixValutatoreIdByAnno::class)->execute('IndennitaCondizioniLavoro', 'CondizioniLavoro', $data['anno']);

            $query = $query->where($data);

           

            return $query;
        })
        ->columns(3)
        ;
    }
}


