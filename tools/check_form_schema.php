#!/usr/bin/env php
<?php

<<<<<<< HEAD
require_once __DIR__.'/../vendor/autoload.php';

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

// Funzione per il logging
function log_info($message) {
    echo "\033[32m[INFO]\033[0m $message\n";
}

function log_warn($message) {
    echo "\033[33m[WARN]\033[0m $message\n";
}

function log_error($message) {
    echo "\033[31m[ERROR]\033[0m $message\n";
}

// Verifica se il file esiste
if (!isset($argv[1]) || !file_exists($argv[1])) {
    log_error("File non trovato: " . ($argv[1] ?? 'non specificato'));
    exit(1);
}

$file = $argv[1];

// 1. Backup del file originale
copy($file, $file . '.bak');
log_info("Backup creato: {$file}.bak");

// 2. Verifica la sintassi del file
log_info("Verifica sintassi PHP...");
$output = [];
$return_var = 0;
exec("php -l $file 2>&1", $output, $return_var);

if ($return_var !== 0) {
    log_error("Errori di sintassi PHP trovati:");
    echo implode("\n", $output) . "\n";
    exit(1);
}

log_info("Sintassi PHP valida");

// 3. Verifica la formattazione
log_info("Verifica formattazione PHP...");
$output = [];
$return_var = 0;
exec("php-cs-fixer fix --dry-run --diff $file 2>&1", $output, $return_var);

if ($return_var !== 0) {
    log_warn("Problemi di formattazione PHP trovati:");
    echo implode("\n", $output) . "\n";
}

// 4. Verifica lo schema del form
log_info("Verifica schema del form...");
$content = file_get_contents($file);
$schema = json_decode($content, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    log_error("Errore nel parsing JSON: " . json_last_error_msg());
    exit(1);
}

// Verifica campi obbligatori
$required_fields = ['name', 'type', 'label'];
foreach ($schema['fields'] as $field) {
    foreach ($required_fields as $required) {
        if (!isset($field[$required])) {
            log_error("Campo mancante '$required' nel form");
            exit(1);
        }
    }
}

log_info("Schema del form valido");

// 5. Verifica i test
if (file_exists('phpunit.xml')) {
    log_info("Esecuzione test...");
    $output = [];
    $return_var = 0;
    exec("php artisan test --filter=" . basename($file) . " 2>&1", $output, $return_var);

    if ($return_var !== 0) {
        log_warn("Test falliti:");
        echo implode("\n", $output) . "\n";
    } else {
        log_info("Test passati");
    }
}

log_info("Verifica completata per: $file");

// 6. Trova altri file con problemi simili
log_info("Ricerca altri file con problemi simili...");
$files_to_check = glob(dirname($file) . '/*.php');

foreach ($files_to_check as $check_file) {
    if ($check_file === $file) continue;
    
    $check_content = file_get_contents($check_file);
    if (strpos($check_content, 'form') !== false) {
        log_warn("File potenzialmente problematico trovato: $check_file");
    }
}
=======
declare(strict_types=1);

use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\preg_match;

/**
 * @return array{file: string, class: string, has_form_schema: bool}|null
 */
function checkFormSchemaMethod(string $file): ?array
{
    $content = file_get_contents($file);

    // Check if the class extends XotBaseResource
    if (! preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $matches)) {
        return null;
    }

    $className = $matches[1];

    // Check if getFormSchema method exists
    $hasFormSchema = preg_match('/public\s+function\s+getFormSchema\s*\(/', $content);

    return [
        'file' => $file,
        'class' => $className,
        'has_form_schema' => (bool) $hasFormSchema,
    ];
}

/**
 * @return array<array{file: string, class: string, has_form_schema: bool}>
 */
function findXotBaseResourceClasses(string $directory): array
{
    $results = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    $phpFiles = new RegexIterator($iterator, '/\.php$/');

    foreach ($phpFiles as $file) {
        if (!$file instanceof SplFileInfo) {
            continue;
        }

        $fileContent = file_get_contents($file->getPathname());

        if (strpos($fileContent, 'extends XotBaseResource') !== false) {
            $check = checkFormSchemaMethod($file->getPathname());
            if ($check !== null) {
                $results[] = $check;
            }
        }
    }

    return $results;
}

$directory = '/var/www/html/base_techplanner_fila3/laravel';
$results = findXotBaseResourceClasses($directory);

// Generate report
$missingFormSchema = array_filter($results, function ($result) {
    return ! $result['has_form_schema'];
});

echo "XotBaseResource Classes Form Schema Check\n";
echo "=======================================\n\n";

if (empty($missingFormSchema)) {
    echo "✅ All XotBaseResource classes have getFormSchema method.\n";
} else {
    echo '❌ '.count($missingFormSchema)." classes missing getFormSchema method:\n\n";
    foreach ($missingFormSchema as $result) {
        echo "- {$result['class']} in {$result['file']}\n";
    }
}

// Write to documentation log
$logContent = date('Y-m-d H:i:s')." - Form Schema Check\n";
$logContent .= 'Total classes checked: '.count($results)."\n";
$logContent .= 'Classes missing getFormSchema: '.count($missingFormSchema)."\n\n";

file_put_contents('/var/www/html/base_techplanner_fila3/docs/documentation_update.log', $logContent, FILE_APPEND);
>>>>>>> e47821df (.)
