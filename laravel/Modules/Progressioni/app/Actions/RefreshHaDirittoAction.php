<?php

declare(strict_types=1);

namespace Modules\Progressioni\Actions;

use Carbon\Carbon;
use Filament\Notifications\Notification;
use Modules\Progressioni\Models\Progressioni;
use Spatie\QueueableAction\QueueableAction;

class RefreshHaDirittoAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Progressioni $record): void
    {
        $criteri_esclusione = $record->criteriEsclusione->where('value', '!=', 0)->where('value', '!=', null);
        $fields_to_resets = $criteri_esclusione->where('field_name', '!=', null);
        $up = [];
        foreach ($fields_to_resets as $field) {
            if (! in_array($field->field_name, ['propro'], false)) {
                $up[$field->field_name] = null;
            }
        }

        $up['gg_cateco_posfun'] = null;
        $up['gg_asz_cateco_posfun'] = null;
        $up['gg_cateco_posfun_in_sede'] = null;
        $up['gg_cateco_posfun_fuori_sede'] = null;
        $up['gg_asz_cateco_posfun_in_sede'] = null;
        $up['gg_asz_cateco_posfun_fuori_sede'] = null;

        $record->update($up);
        Notification::make()
            ->title('Campi Svuotati ['.implode(',', array_keys($up)).']')
            ->success()
            ->send();

        // dddx($criteri_esclusione);
        /*
        foreach($criteri_esclusione as $criterio){
            dddx($criterio);
            $action=
        }
        */
        $module_name = 'Progressioni';
        $criteri_option_class = '\Modules\\'.$module_name.'\Models\CriteriOption';
        $criteri_option = $criteri_option_class::where('anno', $record->anno)
            ->get()
            ->map(function ($item) {
                $value = '';
                switch ($item->type) {
                    case 'list':
                        $value = explode(',', $item->value);
                        break;
                    case 'int':
                        $value = intval($value);
                        break;
                    case 'date':
                        $value = $item->value;
                        if ($value != null) {
                            $value = Carbon::parse($value);
                        }
                        break;
                    default:
                        dddx($item->type);
                        break;
                }
                $item->value_real = $value;

                return $item;
            })
            ->pluck('value_real', 'name');

        app(\Modules\Ptv\Actions\CriteriEsclusione\Check::class)->execute($record, $criteri_esclusione, $criteri_option);
    }
}
