<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Actions;

use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
use Spatie\QueueableAction\QueueableAction;

class MakePdf
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(array $data)
    {
        $view = 'indennitaresponsabilita::actions.make-pdf';
        $values = $data['anno/valutatore'];
        $rows = IndennitaResponsabilita::with(['ratings'])
            ->where($values)
            ->whereHas('ratings', function ($query) {
                $query->havingRaw('SUM(value) > 0');
            })
            ->get();

        $valutatore = StabiDirigente::where('valutatore_id', $values['valutatore_id'])
            ->whereRaw('id=valutatore_id')
            ->where('anno', $values['anno'])
            ->first();

        $view_params = [
            'view' => $view,
            'rows' => $rows,
            'title' => 'Indennita Responsabilita anno '.$rows->first()?->anno,
            'firma' => $valutatore->nome_diri,
        ];

        $out = view($view, $view_params);

        $html = $out->render();

        return app(\Modules\Xot\Actions\Export\PdfByHtmlAction::class)->execute($html);
    }
}
