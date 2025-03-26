<?php

declare(strict_types=1);

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