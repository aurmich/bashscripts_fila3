<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
<<<<<<< HEAD
=======
 * Azione per convertire un video utilizzando il modello MediaConvert.
>>>>>>> origin/dev
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Datas\ConvertData;
use Modules\Media\Models\MediaConvert;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
<<<<<<< HEAD
=======
use ProtoneMedia\LaravelFFMpeg\FFMpeg\FFMpegExporter;
>>>>>>> origin/dev
use Spatie\QueueableAction\QueueableAction;
use FFMpeg\Format\Video\DefaultVideo;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * @method \ProtoneMedia\LaravelFFMpeg\Drivers\PHPFFMpeg inFormat(DefaultVideo $format)
=======
 * Classe per convertire video utilizzando MediaConvert e tenere traccia del progresso.
>>>>>>> origin/dev
 */
class ConvertVideoByMediaConvertAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(ConvertData $data, MediaConvert $record): string
    {
        if (!$data->exists()) {
            throw new \Exception('Il file non esiste');
        }

        $format = $data->getFFMpegFormat();
        $file_new = $record->converted_file;

        if (!$file_new) {
            throw new \Exception('Il nome del file convertito non è stato specificato');
        }

<<<<<<< HEAD
=======
        // Instanziamo il formato prima di usarlo
        $formatInstance = new $format();

        // @phpstan-ignore-next-line
>>>>>>> origin/dev
        FFMpeg::fromDisk($data->disk)
            ->open($data->file)
            ->export()
            ->onProgress(function (float $percentage, float $remaining, float $rate) use ($record): void {
                $record->update([
                    'percentage' => $percentage,
                    'remaining' => $remaining,
                    'rate' => $rate,
                ]);
            })
            ->addFilter('-preset', 'ultrafast')
<<<<<<< HEAD
            ->inFormat($format)
            ->save($file_new);
=======
            // Utilizziamo il formato istanziato come parametro
            ->save($file_new, $formatInstance);
>>>>>>> origin/dev

        $record->update([
            'status' => 'completed',
        ]);

        return $file_new;
    }
}
