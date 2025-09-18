<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Actions;

use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
=======
namespace Modules\Progressioni\Actions;

use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede as Scheda;
>>>>>>> bcab6efe (first)
use Spatie\QueueableAction\QueueableAction;

class MakePdfByRecord
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function execute(IndennitaResponsabilita $record, string $out = 'download')
    {
        $view = 'indennitaresponsabilita::actions.make-pdf-by-record';
        /*
        $values = $data['anno/valutatore'];
        $rows = IndennitaResponsabilita::with(['ratings'])
            ->where($values)
            ->whereHas('ratings')
            ->get();

        $valutatore=StabiDirigente::where('valutatore_id',$values['valutatore_id'])
            ->whereRaw('id=valutatore_id')
            ->where('anno',$values['anno'])
            ->first();
        */
=======
    public function execute(Scheda|Progressioni $record, string $out = 'download')
    {
        $view = 'progressioni::actions.make-pdf-by-record';

>>>>>>> bcab6efe (first)
        $valutatore = $record->valutatore;
        $view_params = [
            'view' => $view,
            'row' => $record,
<<<<<<< HEAD
            'title' => 'Indennita Responsabilita anno '.$record->anno,
=======
            'title' => 'Progressione anno '.$record->anno,
>>>>>>> bcab6efe (first)
            'firma' => $valutatore->nome_diri,
        ];

        $view_out = view($view, $view_params);

        $html = $view_out->render();
        $filename = 'scheda_'.$record->id.'_'.$record->matr.'_'.$record->cognome.'_'.$record->nome.'.pdf';

        return app(\Modules\Xot\Actions\Export\PdfByHtmlAction::class)->execute(
            html: $html,
            filename: $filename,
            disk: 'cache',
            out: $out,
        );
    }
}
