<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD

#!/usr/bin/env php
<?php

declare(strict_types=1);

function checkFormSchemaMethod($file)
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
        'has_form_schema' => $hasFormSchema,
    ];
}

function findXotBaseResourceClasses($directory)
{
    $results = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    $phpFiles = new RegexIterator($iterator, '/\.php$/');

    foreach ($phpFiles as $file) {
        $fileContent = file_get_contents($file->getPathname());

        if (false !== strpos($fileContent, 'extends XotBaseResource')) {
            $check = checkFormSchemaMethod($file->getPathname());
            if ($check) {
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
echo "====\n\n";
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

 origin/dev
=======
>>>>>>> cb513be (.)
>>>>>>> 43df3e0 (.)
=======
>>>>>>> 0440c57 (.)
#!/usr/bin/env php
<?php

declare(strict_types=1);

<<<<<<< HEAD
use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\preg_match;

/**
 * @return array{file: string, class: string, has_form_schema: bool}|null
 */
function checkFormSchemaMethod(string $file): ?array
=======
function checkFormSchemaMethod($file)
>>>>>>> 43df3e0 (.)
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
<<<<<<< HEAD
        'has_form_schema' => (bool) $hasFormSchema,
    ];
}

/**
 * @return array<array{file: string, class: string, has_form_schema: bool}>
 */
function findXotBaseResourceClasses(string $directory): array
=======
        'has_form_schema' => $hasFormSchema,
    ];
}

function findXotBaseResourceClasses($directory)
>>>>>>> 43df3e0 (.)
{
    $results = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    $phpFiles = new RegexIterator($iterator, '/\.php$/');

    foreach ($phpFiles as $file) {
<<<<<<< HEAD
        if (!$file instanceof SplFileInfo) {
            continue;
        }

        $fileContent = file_get_contents($file->getPathname());

        if (strpos($fileContent, 'extends XotBaseResource') !== false) {
            $check = checkFormSchemaMethod($file->getPathname());
            if ($check !== null) {
=======
        $fileContent = file_get_contents($file->getPathname());

        if (false !== strpos($fileContent, 'extends XotBaseResource')) {
            $check = checkFormSchemaMethod($file->getPathname());
            if ($check) {
>>>>>>> 43df3e0 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
echo "====\n\n";
=======
>>>>>>> cb513be (.)
>>>>>>> 43df3e0 (.)
=======
echo "====\n\n";
>>>>>>> 0440c57 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD

 origin/dev
 origin/dev
=======
>>>>>>> cb513be (.)
>>>>>>> 43df3e0 (.)
=======
>>>>>>> 0440c57 (.)
