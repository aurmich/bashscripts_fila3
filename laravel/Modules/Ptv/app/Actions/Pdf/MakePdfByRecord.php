<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\Pdf;

use Exception;
use Modules\Ptv\Models\Contracts\SchedaContract;
use Modules\Xot\Actions\Export\PdfByHtmlAction;
use Modules\Xot\Actions\View\GetViewByModelClassAction;
use Spatie\QueueableAction\QueueableAction;

class MakePdfByRecord
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(SchedaContract $record, string $out = 'download')
    {
        $view = app(GetViewByModelClassAction::class)->execute($record::class, '.show.pdf');

        $valutatore = $record->valutatore;
        $view_params = [
            'view' => $view,
            'row' => $record,
            // 'title' => 'Progressione anno '.$record->anno,
            'firma' => $valutatore?->nome_diri,
        ];
        if (! view()->exists($view)) {
            $msg = 'View ['.$view.'] not found.';
            throw new Exception($msg);
        }

        $view_out = view($view, $view_params);

        $html = $view_out->render();
        $filename = 'scheda_'.$record->id.'_'.$record->matr.'_'.$record->cognome.'_'.$record->nome.'.pdf';

        return app(PdfByHtmlAction::class)->execute(
            html: $html,
            filename: $filename,
            disk: 'cache',
            out: $out,
        );
    }
}
