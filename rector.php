<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Rector\Config\RectorConfig;
<<<<<<< HEAD
<<<<<<< HEAD
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

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
=======
use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

>>>>>>> 58e1cada (.)
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
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
=======
=======
use Rector\Config\RectorConfig;
>>>>>>> 0d55b583 (first)
=======
use Rector\Config\RectorConfig;
>>>>>>> e83070fd (.)
=======
use Rector\Config\RectorConfig;
>>>>>>> bdeae81f (first)
=======
use Rector\Config\RectorConfig;
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNativeCallRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> a8f30311 (first)
=======
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
=======
>>>>>>> d79d9e57 (first)
=======
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 0253339c (first)
use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths(
        [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            __DIR__.'/Modules',
            __DIR__.'/app',
            __DIR__.'/bootstrap',
            __DIR__.'/config',
            __DIR__.'/lang',
            __DIR__.'/resources',
            __DIR__.'/routes',
            __DIR__.'/tests',
=======
            __DIR__,
>>>>>>> a8f30311 (first)
=======
            __DIR__,
>>>>>>> c088001a (first)
=======
            __DIR__,
>>>>>>> d79d9e57 (first)
=======
            __DIR__.'',
>>>>>>> 9cec72d6 (first)
=======
            __DIR__,
>>>>>>> 0253339c (first)
=======
            __DIR__,
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
        ]
    );

    $rectorConfig->skip(
        [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            __DIR__.'/Modules/*/docs',
            __DIR__.'/Modules/*/vendor',
=======
>>>>>>> a8f30311 (first)
            '*/docs',
            '*/vendor',
            './vendor/',
=======
            './vendor/',
            '*/docs',
            '*/vendor',
>>>>>>> c088001a (first)
=======
            './vendor/',
            '*/docs',
            '*/vendor',
>>>>>>> d79d9e57 (first)
=======
            __DIR__,
>>>>>>> 0d55b583 (first)
=======
            __DIR__.'/vendor',
            __DIR__.'/docs',
>>>>>>> 9cec72d6 (first)
=======
            __DIR__,
>>>>>>> e83070fd (.)
=======
            __DIR__,
>>>>>>> bdeae81f (first)
=======
            '*/docs',
            '*/vendor',
            './vendor/',
>>>>>>> 0253339c (first)
=======
            __DIR__.'/vendor',
            __DIR__.'/docs',
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
        ]
    );

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
    // $rectorConfig->rules([
    //    ReturnTypeFromStrictNativeCallRector::class,
    //    ReturnTypeFromStrictScalarReturnExprRector::class,
    // ]);
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
    $rectorConfig->rules(
        [
            ReturnTypeFromStrictNativeCallRector::class,
            ReturnTypeFromStrictScalarReturnExprRector::class,
        ]
    );
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> a8f30311 (first)
=======
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
>>>>>>> c088001a (first)
=======
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
>>>>>>> 0253339c (first)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)

    // define sets of rules
    $rectorConfig->sets(
        [
            PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // SetList::DEAD_CODE,
            // SetList::CODE_QUALITY,
=======
            SetList::DEAD_CODE,
            SetList::CODE_QUALITY,
>>>>>>> d79d9e57 (first)
=======
            SetList::DEAD_CODE,
            SetList::CODE_QUALITY,
>>>>>>> 9cec72d6 (first)
=======
            // SetList::DEAD_CODE,
            // SetList::CODE_QUALITY,
>>>>>>> 0253339c (first)
=======
            // SetList::DEAD_CODE,
            // SetList::CODE_QUALITY,
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
            LevelSetList::UP_TO_PHP_81,
            LaravelSetList::LARAVEL_100,

            // SetList::NAMING, //problemi con injuction
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            SetList::TYPE_DECLARATION,
=======
            // SetList::TYPE_DECLARATION,
>>>>>>> a8f30311 (first)
=======
            SetList::TYPE_DECLARATION,
>>>>>>> c088001a (first)
=======
            // SetList::TYPE_DECLARATION,
>>>>>>> d79d9e57 (first)
            // SetList::CODING_STYLE,
            // SetList::PRIVATIZATION,//problemi con final
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
            // SetList::DEAD_CODE,
            // SetList::CODE_QUALITY,
            LevelSetList::UP_TO_PHP_81,
            LaravelSetList::LARAVEL_100,

            // SetList::NAMING, // error on injection
            // SetList::TYPE_DECLARATION,  //------------------------ vedere cosa fa
            // SetList::CODING_STYLE,
            // SetList::PRIVATIZATION, //error "final class"
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
            // SetList::TYPE_DECLARATION,
            // SetList::CODING_STYLE,
            // SetList::PRIVATIZATION,//problemi con final
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
=======
            SetList::TYPE_DECLARATION,
            // SetList::CODING_STYLE,
            // SetList::PRIVATIZATION,//problemi con final
>>>>>>> 0253339c (first)
=======
            // SetList::TYPE_DECLARATION,
            // SetList::CODING_STYLE,
            // SetList::PRIVATIZATION,//problemi con final
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
            // SetList::EARLY_RETURN,
            // SetList::INSTANCEOF,
        ]
    );

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $rectorConfig->importNames();
};
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> a8f30311 (first)
=======
=======
>>>>>>> 7e417e87 (first)
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/Modules',
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/lang',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ]);

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);

    // define sets of rules
    $rectorConfig->sets([
        PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_81,
        LaravelSetList::LARAVEL_100,
        SetList::DEAD_CODE,
        SetList::NAMING,
        SetList::TYPE_DECLARATION,
        SetList::CODING_STYLE,
        SetList::PRIVATIZATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF,
    ]);

    $rectorConfig->skip([
        // testdummy files
        '*/docs',
        '*/vendor',
    ]);

    $rectorConfig->importNames();
};
<<<<<<< HEAD
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    $rectorConfig->skip(
        [
            // testdummy files
            '*/build',
            '*/docs',
            '*/vendor',
            './vendor/',
            __DIR__.'/vendor',
        ]
    );

    $rectorConfig->importNames();
};
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
    $rectorConfig->importNames();
};
>>>>>>> 9cec72d6 (first)
=======
use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Laravel\Rector\ClassMethod\RedirectRouteToToRouteHelperRector;

return static function (RectorConfig $rectorConfig): void {
    // Paths da analizzare
    safe_object_call($rectorConfig, 'paths', [
        __DIR__.'/Actions',
        __DIR__.'/Casts',
        __DIR__.'/Facades',
        __DIR__.'/Models',
    ]);

    // Files e cartelle da ignorare
    safe_object_call($rectorConfig, 'skip', [
        __DIR__.'/vendor',
        __DIR__.'/database',
        __DIR__.'/resources',
        __DIR__.'/node_modules',
    ]);

    // Regole specifiche
    safe_object_call($rectorConfig, 'rule', RedirectRouteToToRouteHelperRector::class);

    // Set di regole da applicare
    safe_object_call($rectorConfig, 'sets', [
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::EARLY_RETURN,
        LaravelSetList::LARAVEL_90,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_ARRAY_STR_FUNCTIONS_TO_STATIC_CALL,
    ]);

    // Importa i nomi
    safe_object_call($rectorConfig, 'importNames');

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);

    // define sets of rules
    // $rectorConfig->sets(
    //     [
    //         PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
    //         // SetList::DEAD_CODE,
    //         // SetList::CODE_QUALITY,
    //         LevelSetList::UP_TO_PHP_81,
    //         LaravelSetList::LARAVEL_100,

    //         // SetList::NAMING, //problemi con injuction
    //         SetList::TYPE_DECLARATION,
    //         // SetList::CODING_STYLE,
    //         // SetList::PRIVATIZATION,//problemi con final
    //         // SetList::EARLY_RETURN,
    //         // SetList::INSTANCEOF,
    //     ]
    // );
};
>>>>>>> 8fc3049b (first)
=======
>>>>>>> 7e417e87 (first)
=======
>>>>>>> e83070fd (.)
=======
    // uncomment to reach your current PHP version
    ->withPhpSets()
    ->withRules([
        // AddVoidReturnTypeWhereNoReturnRector::class,
    ]);
>>>>>>> 58e1cada (.)
=======
=======
>>>>>>> d8b9f8a6 (up)
=======
>>>>>>> d516087e (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f2e91737 (.)
=======
>>>>>>> d8b9f8a6 (up)
=======
>>>>>>> d516087e (.)
=======
>>>>>>> bdeae81f (first)
=======
    $rectorConfig->importNames();
};
>>>>>>> 0253339c (first)
=======
    $rectorConfig->importNames();
};
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
