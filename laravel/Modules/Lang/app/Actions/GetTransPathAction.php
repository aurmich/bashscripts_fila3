<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
>>>>>>> origin/dev

class GetTransPathAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(string $key): string
    {
        // $finder = trans()->getFinder();
        // dddx($finder);
        // $viewHints = [];
        // if (method_exists($finder, 'getHints')) {
        //    $viewHints = $finder->getHints();
        // }

        $ns = Str::of($key)->before('::')->toString();
        $item = Str::of($key)->after('::')->toString();
        $piece = explode('.', $item);
        $module_path = Module::getModulePath($ns);
        if (Str::endsWith($module_path, '/')) {
            $module_path = Str::of($module_path)->beforeLast('/')->toString();
        }
        $lang = app()->getLocale();
        $relativePath = config('modules.paths.generator.lang.path');
<<<<<<< HEAD
        $lang_path = module_path($ns, $relativePath);

        return $lang_path.'/'.$lang.'/'.$piece[0].'.php';
=======

        // Utilizziamo module_path e verifichiamo che restituisca una stringa
        $lang_path = module_path($ns, $relativePath);
        Assert::string($lang_path, 'Il percorso del modulo deve essere una stringa');

        $file_name = $piece[0] ?? '';
        Assert::string($file_name, 'Il nome del file deve essere una stringa');

        return $lang_path.'/'.$lang.'/'.$file_name.'.php';
>>>>>>> origin/dev
    }
}
