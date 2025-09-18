<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Illuminate\Support\Facades\File;
use Spatie\LaravelData\Data;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 6a0fe737 (.)
=======
>>>>>>> 55edff60 (.)
=======
=======
use Webmozart\Assert\Assert;
>>>>>>> origin/dev
>>>>>>> bb045b6d (.)

class TranslationData extends Data
{
    // public string $id
    public string $lang;

    public string $namespace;

    public string $group;

    public string $item;

    // public string $key;
    public int|string|null $value = null;

    public function getFilename(): string
    {
        $hints = app('translator')->getLoader()->namespaces();
        $path = collect($hints)->get($this->namespace);
        if (null === $path) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }
<<<<<<< HEAD
<<<<<<< HEAD
        
        // Verifichiamo che $path sia una stringa
        Assert::string($path, 'Il percorso del namespace deve essere una stringa');
        
=======

<<<<<<< HEAD
>>>>>>> 6a0fe737 (.)
=======

>>>>>>> 55edff60 (.)
=======
<<<<<<< HEAD
=======
        // Verifichiamo che $path sia una stringa
        Assert::string($path, 'Il percorso del namespace deve essere una stringa');

>>>>>>> origin/dev
>>>>>>> bb045b6d (.)
        return app(\Modules\Xot\Actions\File\FixPathAction::class)->execute($path.'/'.$this->lang.'/'.$this->group.'.php');
    }

    public function getData(): array
    {
        $filename = $this->getFilename();
        $data = [];
        if (File::exists($filename)) {
            $data = File::getRequire($filename);
        }
        if (! is_array($data)) {
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        }

        return $data;
    }
}
