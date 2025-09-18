<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Actions;

use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

final class GeneratePdfAction
{
    use QueueableAction;

    public function execute(
        string $html,
        string $filename,
        string $orientation = 'P',
        string $outputMode = 'download',
    ): string {
        $html2pdf = new Html2Pdf($orientation, 'A4', 'it');
        $html2pdf->setTestTdInOnePage(false);

        try {
            $html2pdf->WriteHTML($html);

            return match ($outputMode) {
                'content' => $html2pdf->Output($filename.'.pdf', 'S'),
                'file' => $this->saveToFile($html2pdf, $filename),
                default => $html2pdf->Output(),
            };
        } catch (Html2PdfException $exception) {
            $html2pdf->clean();
            throw $exception;
        }
    }

    private function saveToFile(Html2Pdf $pdf, string $filename): string
    {
        $pdf->Output($filename, 'F');

        return $filename;
    }
}
=======
namespace Modules\Performance\Actions;

use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf as DomPDF;
use Spatie\QueueableAction\QueueableAction;

class GeneratePdfAction
{
    use QueueableAction;

    public function execute(object $model, array $options): string
    {
        $view = View::make('performance::admin.pdf.scheda', [
            'row' => $model,
            'options' => $options,
        ]);

        $pdf = DomPDF::loadHTML($view->render())
            ->setPaper('a4', $options['pdforientation'] ?? 'portrait');

        return $pdf->output();
    }
} 
>>>>>>> 961ad402 (first)
