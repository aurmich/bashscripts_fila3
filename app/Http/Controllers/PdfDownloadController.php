<?php

declare(strict_types=1);

namespace Modules\Incentivi\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Incentivi\Models\Employee;
use Modules\Incentivi\Models\Project;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Enums\Orientation;
use Spatie\LaravelPdf\Enums\Unit;

use function Spatie\LaravelPdf\Support\pdf;

class PdfDownloadController extends Controller
{
    public function download(Project $project): \Spatie\LaravelPdf\PdfBuilder
    {
        $view = 'incentivi::filament.pdf.pdf-project-report';
        $rupActivity = $project->activities()->where('nome', 'Responsabile Unico del Progetto')->first();
        
        $rupActivityEmployee = 'Non definito';
        if ($rupActivity !== null && property_exists($rupActivity, 'employees') && $rupActivity->employees && $rupActivity->employees->first()) {
            $employee = $rupActivity->employees->first();
            $rupActivityEmployee = $employee->nome . ' ' . $employee->cognome;
        }
        
        $workgroupEmployees = collect();
        if ($project->workgroup !== null) {
            $workgroupEmployees = $project->workgroup->employees;
        }

        $viewParams = [
            'project' => $project,
            'activities' => $project->activities,
            'employees' => $workgroupEmployees,
            'rup' => $rupActivityEmployee,
            'liquidazione' => $this->liquidazione($project),
        ];

        return pdf()
            ->view($view, $viewParams)
            ->orientation(Orientation::Portrait)
            ->format(Format::A4)
            ->margins(10, 10, 20, 0, Unit::Pixel)
            ->name(str_slug($project->nome).'-REPORT.pdf');
    }

    public function sumActivities(Employee $employee): int
    {
        $sum = 0;
        foreach ($employee->activities as $activity) {
            $sum = $sum + $activity->pivot->importo_attivita_dipendente;
        }

        return $sum;
    }

    public function sumActivitiesPerYear(Employee $employee, array $uniqueYears): array
    {
        $years = [];
        foreach ($uniqueYears as $year) {
            $yearSum = 0;
            foreach ($employee->activities->where('anno_competenza', $year) as $activity) {
                $yearSum = $yearSum + $activity->pivot->importo_attivita_dipendente;
            }
            $years[] = [
                'year' => $year,
                'total' => $yearSum,
            ];
        }

        return $years;
    }

    public static function sumPerColumn(Project $project, int $anno): float
    {
        $sum = 0;
        $activities = $project
            ->activities()->with('employees')->where('anno_competenza', $anno)->get();
        foreach ($activities as $activity) {
            if (property_exists($activity, 'employees') && $activity->employees) {
                foreach ($activity->employees->where('tipologia', 'I') as $employee) {
                    $sum += $employee->pivot->importo_attivita_dipendente;
                }
            }
        }

        return $sum;
    }

    public function liquidazione(Project $project): array
    {
        $dipendenti = [];
        $years = [];

        $projectActivities = $project->activities;
        $uniqueYears = $projectActivities->pluck('anno_competenza')->unique()->toArray();

        if (property_exists($project, 'employees') && $project->employees) {
            foreach ($project->employees->where('tipologia', 'I') as $employee => $value) {
                $dipendenti[$value->cognome] = [
                    'employee' => $value,
                    'totale' => $this->sumActivities($value),
                    'years' => $this->sumActivitiesPerYear($value, $uniqueYears),
                ];
                // dd($dipendenti[$value->cognome]);
            }
        }

        return $dipendenti;
    }
}
