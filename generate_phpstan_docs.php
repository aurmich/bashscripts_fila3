#!/usr/bin/env php
<?php

declare(strict_types=1);

// Questo script genera report PHPStan per i moduli e un indice centrale
$projectRoot = realpath(__DIR__ . '/../');
if (false === $projectRoot) {
    fwrite(STDERR, "Impossibile determinare la directory del progetto.\n");
    exit(1);
}

$modulesDir = $projectRoot . '/laravel/Modules';
$rootDocsDir = $projectRoot . '/docs';
$indexFile = $rootDocsDir . '/phpstan_modules_index.md';

$indexContent = "# Indice Report PHPStan Moduli\n\n";

foreach (scandir($modulesDir) as $module) {
    if ($module === '.' || $module === '..') {
        continue;
    }
    $modulePath = $modulesDir . "/{$module}";
    if (!is_dir($modulePath)) {
        continue;
    }
    $phpstanDir = $modulePath . '/docs/phpstan';
    if (!is_dir($phpstanDir)) {
        continue;
    }
    $indexContent .= "## Modulo **{$module}**\n\n";
    for ($level = 1; $level <= 10; $level++) {
        $mdRelativePath = str_replace($projectRoot . '/', '', $phpstanDir) . "/level_{$level}.md";
        $indexContent .= "- [Livello {$level}]({$mdRelativePath})\n";
    }
    $indexContent .= "\n";
}

file_put_contents($indexFile, $indexContent);

fwrite(STDOUT, "Indice principale generato in {$indexFile}\n");
