<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
$finder = PhpCsFixer\Finder::create()
    ->notPath('bootstrap/cache')
    ->notPath('storage')
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

$config = new PhpCsFixer\Config();

$config
    ->setRules([
        '@Symfony' => true,
        'array_indentation' => true,
<<<<<<< HEAD
<<<<<<< HEAD
        '@PhpCsFixer:risky' => true,
=======
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
        'function_typehint_space' => true,
        'declare_equal_normalize' => true,
        'declare_strict_types' => true,
        'combine_consecutive_unsets' => true,
<<<<<<< HEAD
<<<<<<< HEAD
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
<<<<<<< HEAD
<<<<<<< HEAD
=======
        'phpdoc_order' => true,
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
        'phpdoc_order' => true,
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
        'php_unit_construct' => false,
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
        ],
        'function_declaration' => true,
        'blank_line_after_namespace' => true,
        'class_definition' => true,
        'elseif' => true,
<<<<<<< HEAD
<<<<<<< HEAD
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_trim' => true,
        'phpdoc_summary' => false,
=======
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
    ])
    ->setFinder($finder)
;

<<<<<<< HEAD
<<<<<<< HEAD
return $config;
=======
return $config;
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
return $config;
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
