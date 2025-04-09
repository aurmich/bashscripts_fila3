<?php

<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> temp-branch
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
;
=======
>>>>>>> temp-branch

$config = new PhpCsFixer\Config();

$config
    ->setRules([
        '@Symfony' => true,
        'array_indentation' => true,
<<<<<<< HEAD
        '@PhpCsFixer:risky' => true,
=======
>>>>>>> temp-branch
        'function_typehint_space' => true,
        'declare_equal_normalize' => true,
        'declare_strict_types' => true,
        'combine_consecutive_unsets' => true,
<<<<<<< HEAD
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> temp-branch
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
<<<<<<< HEAD
=======
        'phpdoc_order' => true,
>>>>>>> temp-branch
        'php_unit_construct' => false,
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
        ],
        'function_declaration' => true,
        'blank_line_after_namespace' => true,
        'class_definition' => true,
        'elseif' => true,
<<<<<<< HEAD
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_trim' => true,
        'phpdoc_summary' => false,
    ])
    ->setFinder($finder)
;

return $config;
=======
    ])
    ->setFinder($finder)

return $config;
>>>>>>> temp-branch
