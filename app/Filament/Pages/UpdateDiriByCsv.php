<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Rep00f;

class UpdateDiriByCsv extends Page implements HasForms
{
    use InteractsWithForms;

    // public ?UploadedFile $csvFile = null;

    public ?array $data = [];

    protected static string $view = 'indennitaresponsabilita::filament.pages.import-csv';

    protected static string $icon = 'heroicon-o-upload'; // Add icon here

    protected static bool $shouldRegisterNavigation = false;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\FileUpload::make('csvFile')
                ->label(__('indennitaresponsabilita::messages.upload_csv'))
                ->acceptedFileTypes(['text/csv', 'text/plain'])
                ->required()
                ->columnSpan('full'),
        ];
    }

    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema())
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        // dddx($data);

        try {
            // $path = $this->handleFileUpload($data['csvFile']);
            $path = Storage::disk('public')->path($data['csvFile']);
            $records = $this->processCSV($path);

            // Call the updateDiri action with the CSV data
            $this->updateDiri($records);

            Notification::make()
                ->title(__('indennitaresponsabilita::messages.csv_processed'))
                ->success()
                ->send();
        } catch (\Throwable $e) {
            // Handle errors and notify
            Notification::make()
                ->title(__('indennitaresponsabilita::messages.error'))
                ->danger()
                ->body($e->getMessage())
                ->send();
        }
    }

    protected function handleFileUpload(UploadedFile $file): string
    {
        return $file->storeAs('csv-uploads', $file->getClientOriginalName());
    }

    protected function processCSV(string $path): array
    {
        // $csv = Reader::createFromPath(Storage::path($path), 'r');
        // $csv = Reader::createFromPath($path, 'r');
        // $csv->setHeaderOffset(0); // Assuming first row contains headers

        $csv = Reader::createFromPath($path, 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        // returns all the records as
        $records = $csv->getRecords(); // an Iterator object containing arrays
        // $records = $csv->getRecordsAsObject(MyDTO::class); // an Iterator object containing MyDTO objects
        $rows = iterator_to_array($records);

        return $rows;
    }

    public function updateDiri(array $data): void
    {
        $anno = 2024;
        $ente = 90;

        StabiDirigente::where('anno', $anno)
            ->where('matr', null)
            ->delete();

        $rows = [];

        // Example logic to process $data
        foreach ($data as $record) {
            // Process each record, example: map data to your models
            $where = [
                'anno' => $anno,
                'ente' => $ente,
                'matr' => $record['DIRI'],
            ];

            $diris = StabiDirigente::where($where)->get();

            if ($diris->count() == 0) {
                $anag = Ana10f::firstWhere(Arr::only($where, ['ente', 'matr']));
                $rep = Rep00f::where(Arr::only($where, ['ente', 'matr']))
                    ->whereRaw('repann=""')
                    ->orderBy('rep2kd', 'desc')
                    ->first();

                $data = $where;
                $data['nome_diri'] = $anag->conome.' '.$anag->nome;
                $data['stabi'] = $rep->repst1;
                $data['repar'] = $rep->repre1;
                StabiDirigente::create($data);
            }

            if ($diris->count() == 1) {
                $diri = $diris->first();
                $diri->valutatore_id = $diri->id;
                $diri->save();
            }
            if ($diris->count() > 1) {
                dddx($diris);
            }

            $valutatore_id = $diris->where('valutatore_id', '!=', null)->first()?->id;
            if ($valutatore_id == null) {
                dddx('ERRORE');
            }
            $where1 = [
                'anno' => $anno,
                'ente' => $ente,
                'matr' => $record['Matricola'],
            ];
            $r = IndennitaResponsabilita::where($where1)->update(['valutatore_id' => $valutatore_id]);
        }

        dddx($rows);
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Button::make('submit')
                ->label(__('indennitaresponsabilita::messages.process_csv'))
                ->action('submit'),
        ];
    }
}
