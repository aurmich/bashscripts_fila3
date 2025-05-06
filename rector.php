<<<<<<< HEAD
=======
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/',
    ])
    ->withSkip([
        __DIR__.'/vendor',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets()
    ->withRules([
        // AddVoidReturnTypeWhereNoReturnRector::class,
    ]);

[0;34mℹ️ [2025-04-22 11:23:26] Scelto blocco HEAD (20 linee vs 1)[0m
>>>>>>> a2974b79 (.)
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

/**
 * Configurazione Rector per l'analisi statica e la trasformazione automatica del codice
<<<<<<< HEAD
 *
 * Perché: Rector è uno strumento essenziale per mantenere la qualità del codice e facilitare
 * l'aggiornamento automatico a nuove versioni di PHP e alle best practices più recenti.
 *
=======
 * 
 * Perché: Rector è uno strumento essenziale per mantenere la qualità del codice e facilitare
 * l'aggiornamento automatico a nuove versioni di PHP e alle best practices più recenti.
 * 
>>>>>>> a2974b79 (.)
 * Cosa: Questa configurazione definisce:
 * - I percorsi da analizzare
 * - I percorsi da escludere
 * - Le regole di trasformazione da applicare
 * - La compatibilità con la versione di PHP del progetto
 */
<<<<<<< HEAD
=======

[0;34mℹ️ [2025-04-22 11:23:26] Scelto blocco HEAD (13 linee vs 1)[0m
>>>>>>> a2974b79 (.)
return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/',
    ])
    ->withSkip([
        __DIR__.'/vendor',
    ])
<<<<<<< HEAD
    // Imposta la compatibilità con la versione PHP corrente
    ->withPhpSets()
    ->withRules([
        // Regole di trasformazione, attualmente commentate
        // AddVoidReturnTypeWhereNoReturnRector::class,
    ]);
=======

[0;34mℹ️ [2025-04-22 11:23:26] Scelto blocco incoming (1 linee vs 1)[0m
>>>>>>> a2974b79 (.)
