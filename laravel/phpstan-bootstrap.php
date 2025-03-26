<?php

declare(strict_types=1);

/**
 * File di bootstrap per PHPStan.
 * Questo file contiene le definizioni delle costanti e altre impostazioni necessarie
 * per l'analisi statica del codice con PHPStan.
 */

// Definiamo costanti PDO che potrebbero non essere disponibili durante l'analisi statica
if (!defined('PDO::MYSQL_ATTR_LOCAL_INFILE')) {
    define('PDO::MYSQL_ATTR_LOCAL_INFILE', 1);
}

if (!defined('PDO::MYSQL_ATTR_USE_BUFFERED_QUERY')) {
    define('PDO::MYSQL_ATTR_USE_BUFFERED_QUERY', 2);
}

// Altre costanti che potrebbero causare problemi durante l'analisi
if (!defined('PHP_WINDOWS_VERSION_MAJOR')) {
    define('PHP_WINDOWS_VERSION_MAJOR', 10);
}

// Definiamo alcune funzioni stub per evitare problemi con funzioni che PHPStan non riconosce
if (!function_exists('curl_init') && !defined('PHPSTAN_CURL_STUB')) {
    define('PHPSTAN_CURL_STUB', true);
    function curl_init() {}
    function curl_setopt() {}
    function curl_exec() {}
    function curl_close() {}
}

// Definiamo le costanti per le estensioni che potrebbero non essere caricate
if (!defined('IMAGETYPE_JPEG') && !defined('PHPSTAN_GD_STUB')) {
    define('PHPSTAN_GD_STUB', true);
    define('IMAGETYPE_JPEG', 'jpeg');
    define('IMAGETYPE_PNG', 'png');
    define('IMAGETYPE_GIF', 'gif');
}
