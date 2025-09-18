<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Actions;

use Illuminate\Support\Facades\Storage;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Html2Pdf;
=======
namespace Modules\IndennitaResponsabilita\Actions;

use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> e0005d7d (first)

class MakePdf
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(array $data)
    {
        $values = $data['anno/valutatore'];
        $rows = CondizioniLavoro::where($values)->whereHas('indennitaTipoDettaglio')->get();
        $view = 'indennitacondizionilavoro::actions.make-pdf';
=======
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

>>>>>>> e0005d7d (first)
        $valutatore = StabiDirigente::where('valutatore_id', $values['valutatore_id'])
            ->whereRaw('id=valutatore_id')
            ->where('anno', $values['anno'])
            ->first();

        $view_params = [
<<<<<<< HEAD
            'rows' => $rows,
            'firma' => $valutatore?->nome_diri,
        ];
        $out = view($view, $view_params);
        $html = $out->render();

        $html2pdf = new Html2Pdf('L', 'A4', 'it');
        $html2pdf->writeHTML($html);
        $filename = 'my_doc.pdf';
        $path = Storage::disk('cache')->path($filename);
        $html2pdf->output($path, 'F');

        $res = $html2pdf->output($path, 'F');

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($path, $filename, $headers);
=======
            'view' => $view,
            'rows' => $rows,
            'title' => 'Indennita Responsabilita anno '.$rows->first()?->anno,
            'firma' => $valutatore->nome_diri,
        ];

        $out = view($view, $view_params);

        $html = $out->render();

        return app(\Modules\Xot\Actions\Export\PdfByHtmlAction::class)->execute($html);
>>>>>>> e0005d7d (first)
    }
}
