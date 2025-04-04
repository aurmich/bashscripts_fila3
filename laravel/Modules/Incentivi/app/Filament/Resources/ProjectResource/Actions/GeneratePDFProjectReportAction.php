<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Actions;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Modules\Incentivi\Models\Project;
use Modules\Xot\Actions\Export\PdfByHtmlAction_Portrait;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GeneratePDFProjectReportAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('Scarica PDF Resoconto')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('primary')
            ->action(function (Model $project): BinaryFileResponse {
                /**
                 * How to get the current project inside an EditPage using "Model $project" as a parameter:
                 *
                 * How to get the main project:
                 * $project = $project;
                 * $project_name = $project->nome;
                 *
                 * How to get relationships:
                 * $projet_workgroup = $project->workgroup;
                 * $project_activities = $project->activities;
                 */
                $view = 'incentivi::filament.pdf.pdf-project-report';

                $rupActivity = $project->activities->where('nome', 'Responsabile Unico del Progetto')->first();
                $rupActivityEmployee = $rupActivity && $rupActivity->employees->first() ?
                    $rupActivity->employees->first()->nome.' '.$rupActivity->employees->first()->cognome :
                    'Non definito';

                // parametri passati alla view
                $viewParams = [
                    'project' => $project,
                    'activities' => $project->activities,
                    'rup' => $rupActivityEmployee,
                ];

                $out = view($view, $viewParams);
                $html = $out->render();
                $pdfAction = app(PdfByHtmlAction_Portrait::class);

                $pdfName = str_slug($project->nome).'-REPORT'.'.pdf';

                /** @var BinaryFileResponse */
                $response = $pdfAction->execute(
                    $html,
                    $pdfName,
                    'public',
                    'download'
                );

                return $response;
            })
            // ->visible(fn (Model $record): bool => $record->getAttribute('stato')->value === 'concluso')
            ;
    }

    public static function getDefaultName(): ?string
    {
        return 'GeneratePDFProjectReportAction';
    }
}
