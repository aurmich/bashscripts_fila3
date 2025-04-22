<<<<<<< HEAD
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
=======
>>>>>>> cb513be (.)
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

<<<<<<< HEAD
/**
 * Configurazione Rector per l'analisi statica e la trasformazione automatica del codice
 * 
 * Perché: Rector è uno strumento essenziale per mantenere la qualità del codice e facilitare
 * l'aggiornamento automatico a nuove versioni di PHP e alle best practices più recenti.
 * 
 * Cosa: Questa configurazione definisce:
 * - I percorsi da analizzare
 * - I percorsi da escludere
 * - Le regole di trasformazione da applicare
 * - La compatibilità con la versione di PHP del progetto
 */

[0;34mℹ️ [2025-04-22 11:23:26] Scelto blocco HEAD (13 linee vs 1)[0m
=======
>>>>>>> cb513be (.)
return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/',
    ])
    ->withSkip([
        __DIR__.'/vendor',
    ])
<<<<<<< HEAD

[0;34mℹ️ [2025-04-22 11:23:26] Scelto blocco incoming (1 linee vs 1)[0m
=======
    // uncomment to reach your current PHP version
    ->withPhpSets()
    ->withRules([
        // AddVoidReturnTypeWhereNoReturnRector::class,
    ]);
>>>>>>> cb513be (.)
