<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources\SchedeResource\Actions\Header;

use Filament\Actions\Action;
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Progressioni\Actions\RefreshByYearAction;
use Modules\Progressioni\Models\StabiDirigente;
use Modules\Xot\Actions\Export\PdfByViewAction;

class MakePdfAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'ricalcola';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('')
            ->tooltip('PDF')
            // ->icon('fas-file-pdf')
            ->icon('heroicon-o-document-text')
            ->action(function ($livewire, $record, $action) {
                $filename = class_basename($livewire).'-'.collect($livewire->tableFilters)->flatten()->implode('-').'.pdf';
                $module = Str::of(get_class($livewire))->between('Modules\\', '\Filament\\')->lower()->toString();
                $transKey = $module.'::'.Str::of(class_basename($livewire))
                    ->kebab()
                    ->replace('list-', '')
                    ->singular()
                    ->append('.fields')
                    ->toString();

                $view = $module.'::admin.'.Str::of(class_basename($livewire))
                    ->kebab()
                    ->replace('list-', '')
                    ->singular()
                    ->append('.pdf')
                    ->toString();

                $query = $livewire->getFilteredTableQuery()->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                $rows = $query->where('ha_diritto', 1)
                    // ->orderByDesc('totale')
                    ->orderByDesc('punt_progressione_finale')
                    // ->orderByDesc('totale_pond')
                    ->orderByDesc('excellences_count_last_3_years') // 2023
                    ->orderByDesc('perf_ind_media')

                    ->orderByDesc('gg_cateco_posfun_no_asz')
                    // ->orderByDesc('excellences_count_last_3_years') // 2024
                    ->orderByDesc('gg_in_sede')
                    ->orderByDesc('eta')
                    ->get();

                $fix_rows = $rows->where('perf_ind_media', '<', 1);
                $model = $livewire->getModel();
                foreach ($fix_rows as $frow) {
                    $row = $model::firstWhere('id', $frow->id);
                    $row->perf_ind_media = $row->perfIndMedia();
                    $row->save();
                }

                $fix_rows = $rows->where('excellences_count_last_3_years', '<', 1);
                foreach ($fix_rows as $frow) {
                    $row = $model::firstWhere('id', $frow->id);
                    $row->excellences_count_last_3_years = $row->excellencesCountLast3Years();
                    $row->save();
                }

                $anno = Arr::get($livewire->tableFilters, 'anno/valutatore.anno');
                $valutatore_id = Arr::get($livewire->tableFilters, 'anno/valutatore.valutatore_id');

                $valutatore = StabiDirigente::where('valutatore_id', $valutatore_id)
                    ->whereRaw('id=valutatore_id')
                    ->where('anno', $anno)
                    ->first();
                /*
                dddx([
                    'transkey'=>$transKey,
                    'view'=>$view,
                    'livewire'=>get_class($livewire),
                ]);
                */
                $view_params = [
                    'transKey' => $transKey,
                    'rows' => $rows->groupBy('categoria_ecoval'),
                    'firma' => $valutatore?->nome_diri,
                ];
                // dddx($view);//progressioni::admin.schede.pdf
                $out = view($view, $view_params);

                return app(PdfByViewAction::class)->execute($out, $filename);

                /*
                $resource = $livewire->getResource();

                dddx([
                    'rows' => $rows,
                    'resource' => $resource,
                    'livewire' => $livewire,
                ]);
                */

                /*
                $modelClass = $livewire->getResource()::getModel();
                $year = Arr::get($livewire->tableFilters, 'anno.value'); // 2023

                $fieldname = 'anno';
                app(RefreshByYearAction::class)->execute($modelClass, $fieldname, $year);
                */
                /*
                Notification::make()
                    ->title('Successfully')
                    ->success()
                    ->send();
                */
            });
    }
}
