<?php

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
declare(strict_types=1);

>>>>>>> 8fc3049b (first)
=======
>>>>>>> e83070fd (.)
=======
declare(strict_types=1);

>>>>>>> f3c337b1 (.)
=======
>>>>>>> bdeae81f (first)
=======
declare(strict_types=1);

>>>>>>> 0253339c (first)
=======
>>>>>>> bc2abf99 (.)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
=======
declare(strict_types=1);

>>>>>>> 55edff60 (.)
$finder = PhpCsFixer\Finder::create()
    ->notPath('bootstrap/cache')
    ->notPath('storage')
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
;
=======
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
;
>>>>>>> 9cec72d6 (first)
=======
;
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> 8fc3049b (first)
=======
>>>>>>> e83070fd (.)
=======
;
>>>>>>> f3c337b1 (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
;
>>>>>>> bc2abf99 (.)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
=======
;
>>>>>>> 55edff60 (.)

$config = new PhpCsFixer\Config();

$config
    ->setRules([
        '@Symfony' => true,
        'array_indentation' => true,
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        '@PhpCsFixer:risky' => true,
=======
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> 8fc3049b (first)
=======
>>>>>>> e83070fd (.)
=======
        '@PhpCsFixer:risky' => true,
>>>>>>> f3c337b1 (.)
=======
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
>>>>>>> bc2abf99 (.)
=======
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
=======
        '@PhpCsFixer:risky' => true,
>>>>>>> 55edff60 (.)
        'function_typehint_space' => true,
        'declare_equal_normalize' => true,
        'declare_strict_types' => true,
        'combine_consecutive_unsets' => true,
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 59bc4fe7 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> a8f30311 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> bbec4378 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> c088001a (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> d79d9e57 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 0d55b583 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 9cec72d6 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 2df6fbc8 (first)
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 8fc3049b (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> e83070fd (.)
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> f3c337b1 (.)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> bdeae81f (first)
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 0253339c (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> bc2abf99 (.)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 55edff60 (.)
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        'phpdoc_order' => true,
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
        'phpdoc_order' => true,
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
        'phpdoc_order' => true,
>>>>>>> 59bc4fe7 (first)
=======
        'phpdoc_order' => true,
>>>>>>> a8f30311 (first)
=======
        'phpdoc_order' => true,
>>>>>>> bbec4378 (first)
=======
        'phpdoc_order' => true,
>>>>>>> c088001a (first)
=======
        'phpdoc_order' => true,
>>>>>>> d79d9e57 (first)
=======
        'phpdoc_order' => true,
>>>>>>> 0d55b583 (first)
=======
        'phpdoc_order' => true,
>>>>>>> 9cec72d6 (first)
=======
        'phpdoc_order' => true,
>>>>>>> 2df6fbc8 (first)
=======
        'phpdoc_order' => true,
>>>>>>> 8fc3049b (first)
=======
        'phpdoc_order' => true,
>>>>>>> e83070fd (.)
=======
>>>>>>> f3c337b1 (.)
=======
        'phpdoc_order' => true,
>>>>>>> bdeae81f (first)
=======
        'phpdoc_order' => true,
>>>>>>> 0253339c (first)
=======
        'phpdoc_order' => true,
>>>>>>> bc2abf99 (.)
=======
        'phpdoc_order' => true,
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
=======
>>>>>>> 55edff60 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3c337b1 (.)
=======
>>>>>>> 55edff60 (.)
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_trim' => true,
        'phpdoc_summary' => false,
<<<<<<< HEAD
=======
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> bc2abf99 (.)
=======
>>>>>>> 55edff60 (.)
    ])
    ->setFinder($finder)
;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
return $config;
<<<<<<< HEAD
=======
return $config;
>>>>>>> 164b8363 (Squashed 'laravel/Modules/Rating/' content from commit e5c84117)
=======
return $config;
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
=======
>>>>>>> 8fc3049b (first)
=======
>>>>>>> 0253339c (first)
    ])
    ->setFinder($finder)

return $config;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> a8f30311 (first)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> bbec4378 (first)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> c088001a (first)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> d79d9e57 (first)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> 0d55b583 (first)
=======
return $config;
>>>>>>> 9cec72d6 (first)
=======
return $config;
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> 8fc3049b (first)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> e83070fd (.)
=======
>>>>>>> f3c337b1 (.)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> bdeae81f (first)
=======
>>>>>>> 0253339c (first)
=======
return $config;
>>>>>>> bc2abf99 (.)
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
=======
return $config;
>>>>>>> 55edff60 (.)
