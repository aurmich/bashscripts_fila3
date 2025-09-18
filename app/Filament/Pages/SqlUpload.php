<?php

declare(strict_types=1);

namespace Modules\Sigma\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Storage;
use Modules\Xot\Actions\Import\ImportCsvAction;

class SqlUpload extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public string $disk = 'cache';

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    protected static string $view = 'sigma::filament.pages.sql-upload';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('db')
                    ->default('generale')
                    ->required(),
                TextInput::make('tbl')
                    ->required(),

                FileUpload::make('attachment')
                    // ->acceptedFileTypes(['application/pdf'])
                    ->disk($this->disk)
                    ->maxSize(1024000)
                    ->preserveFilenames(),

                // TextInput::make('filename')
                //    ->required(),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $filename = $data['attachment'];
            // $filename = $data['filename'];
            $storage = Storage::disk($this->disk);
            $mime_type = $storage->mimeType($filename);
            $path = $storage->path($filename);
            $info = pathinfo($path);
            if ($mime_type === 'application/zip') {
                $zip = new \ZipArchive;
                if ($zip->open($path) === true) {
                    $zip->extractTo(dirname($path));
                    $zip->close();
                } else {
                    dddx('failed');
                }
            }
            $sql_filename = $info['filename'].'.sql';
            $csv_filename = $info['filename'].'.csv';
            if ($storage->exists($csv_filename)) {
                app(ImportCsvAction::class)->execute($this->disk, $csv_filename, $data['db'], $data['tbl']);
            }
        } catch (Halt $exception) {
            return;
        }
    }
}
