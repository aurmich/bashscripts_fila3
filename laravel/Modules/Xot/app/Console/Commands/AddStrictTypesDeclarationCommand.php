<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AddStrictTypesDeclarationAction;

class AddStrictTypesDeclarationCommand extends Command
{
    protected $signature = 'xot:add-strict-types 
                            {--module= : Nome del modulo specifico da processare}
                            {--dry-run : Mostra solo i file che verrebbero modificati senza apportare modifiche}';

    protected $description = 'Aggiunge la dichiarazione strict_types=1 ai file PHP che ne sono sprovvisti';

    private array $excludedPaths = [
        'views',
        'config',
        'routes',
        'lang',
        'docs',
        '.php-cs-fixer',
    ];

    public function handle(AddStrictTypesDeclarationAction $action): int
    {
        $modulePath = base_path('Modules');
        $moduleOption = $this->option('module');
        $dryRun = $this->option('dry-run');

        if ($moduleOption) {
<<<<<<< HEAD
            $modulePath .= '/'.$moduleOption;
            if (! File::isDirectory($modulePath)) {
                $this->error("Il modulo {$moduleOption} non esiste");

=======
            $modulePath .= '/' . $moduleOption;
            if (!File::isDirectory($modulePath)) {
                $this->error("Il modulo {$moduleOption} non esiste");
>>>>>>> 55edff60 (.)
                return 1;
            }
        }

        $files = $this->findPhpFiles($modulePath);
        $count = 0;

        foreach ($files as $file) {
            if ($this->shouldProcessFile($file)) {
                if ($dryRun) {
                    $this->info("Verrebbe processato: {$file}");
<<<<<<< HEAD
                    ++$count;
=======
                    $count++;
>>>>>>> 55edff60 (.)
                    continue;
                }

                try {
                    $path = $file->getRealPath();
<<<<<<< HEAD
                    if (false === $path) {
                        continue;
                    }

                    $action->execute($path);
                    $this->info("Aggiunta dichiarazione strict_types a: {$path}");
                    ++$count;
                } catch (\Exception $e) {
                    $filePath = $file->getRealPath() ?: $file->getPathname();
                    $this->error("Errore nel processare {$filePath}: ".$e->getMessage());
=======
                    if ($path === false) {
                        continue;
                    }
                    
                    $action->execute($path);
                    $this->info("Aggiunta dichiarazione strict_types a: {$path}");
                    $count++;
                } catch (\Exception $e) {
                    $this->error("Errore nel processare {$path}: " . $e->getMessage());
>>>>>>> 55edff60 (.)
                }
            }
        }

        $action = $dryRun ? 'Trovati' : 'Processati';
        $this->info("{$action} {$count} file");

        return 0;
    }

    private function findPhpFiles(string $path): array
    {
        return File::allFiles($path);
    }

    private function shouldProcessFile(\SplFileInfo $file): bool
    {
        // Verifica l'estensione
<<<<<<< HEAD
        if (! str_ends_with($file->getFilename(), '.php')) {
=======
        if (!str_ends_with($file->getFilename(), '.php')) {
>>>>>>> 55edff60 (.)
            return false;
        }

        $path = $file->getRealPath();
<<<<<<< HEAD
        if (false === $path) {
=======
        if ($path === false) {
>>>>>>> 55edff60 (.)
            return false;
        }

        // Verifica se il file è in un percorso escluso
        foreach ($this->excludedPaths as $excludedPath) {
            if (str_contains($path, "/{$excludedPath}/")) {
                return false;
            }
        }

        // Verifica se il file ha già la dichiarazione strict_types
        $content = File::get($path);
<<<<<<< HEAD

        return ! str_contains($content, 'declare(strict_types=1)');
=======
        return !str_contains($content, 'declare(strict_types=1)');
>>>>>>> 55edff60 (.)
    }
}
