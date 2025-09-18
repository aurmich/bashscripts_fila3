<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Actions;

use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
=======
namespace Modules\Progressioni\Actions;

use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede as Scheda;
>>>>>>> bcab6efe (first)
=======
namespace Modules\Performance\Actions;

use Exception;
use Modules\Performance\Models\Individuale as Scheda;
use Modules\Performance\Models\Valutatore;
>>>>>>> 961ad402 (first)
use Spatie\QueueableAction\QueueableAction;

class MakePdfByRecord
{
    use QueueableAction;

    /**
<<<<<<< HEAD
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
=======
     * Generate PDF for a performance record.
     *
     * @param Scheda $record The performance record
     * @param string $out Output type ('download' or other)
     * @return mixed The PDF output
     * @throws Exception If valutatore relation is not loaded
     */
    public function execute(Scheda $record, string $out = 'download')
    {
        $view = 'performance::actions.make-pdf-by-record';

        $valutatore = $record->valutatore;
        if (!$valutatore instanceof Valutatore) {
            throw new Exception('Valutatore relation not loaded or invalid');
        }
        $view_params = [
            'view' => $view,
            'row' => $record,
            'title' => 'Progressione anno '.$record->anno,
>>>>>>> 961ad402 (first)
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
