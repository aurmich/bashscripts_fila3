<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Actions;

use Illuminate\Support\Facades\Storage;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Html2Pdf;

class MakePdf
{
    use QueueableAction;

    public function execute(array $data)
    {
        $values = $data['anno/valutatore'];
        $rows = CondizioniLavoro::where($values)->whereHas('indennitaTipoDettaglio')->get();
        $view = 'indennitacondizionilavoro::actions.make-pdf';
        $valutatore = StabiDirigente::where('valutatore_id', $values['valutatore_id'])
            ->whereRaw('id=valutatore_id')
            ->where('anno', $values['anno'])
            ->first();

        $view_params = [
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
    }
}
