<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Ptv\Filament\Actions\Bulk;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\Storage;
use Modules\Ptv\Actions\Pdf\MakePdfByRecord;
use ZipArchive;

class ZipSchedeBulkAction extends BulkAction
{
    public static function getDefaultName(): ?string
    {
        return 'zip_scehde';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')
            ->tooltip('Zip Schede')
            ->icon('fas-file-zipper')
            ->action(function ($livewire, $action, $records) {
                $zip = new ZipArchive;
                $zip_file = class_basename($livewire).'-'.collect($livewire->tableFilters)->flatten()->implode('-').'.zip';
                $zip_file = Storage::disk('cache')->path($zip_file);
                if ($zip->open($zip_file, ZipArchive::CREATE) === true) {
                    foreach ($records as $record) {
                        $value = app(MakePdfByRecord::class)->execute($record, 'content');
                        $filename = 'scheda_'.$record->id.'_'.$record->matr.'_'.$record->cognome.'_'.$record->nome.'.pdf';
                        // $relativeNameInZipFile = basename($value);
                        // $zip->addFile($value, $filename);
                        $zip->addFromString($filename, $value);
                    }

                    $zip->close();
                }

                return response()->download($zip_file);
            });
    }
}
