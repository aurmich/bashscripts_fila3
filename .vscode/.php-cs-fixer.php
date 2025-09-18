<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 8fc3049b (first)
=======
>>>>>>> e83070fd (.)
=======
declare(strict_types=1);

>>>>>>> 0253339c (first)
=======
>>>>>>> bc2abf99 (.)
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
>>>>>>> 0253339c (first)
=======
;
>>>>>>> bc2abf99 (.)

$config = new PhpCsFixer\Config();

$config
    ->setRules([
        '@Symfony' => true,
        'array_indentation' => true,
        'function_typehint_space' => true,
        'declare_equal_normalize' => true,
        'declare_strict_types' => true,
        'combine_consecutive_unsets' => true,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //'binary_operator_spaces' => ['align_double_arrow' => false],
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 8fc3049b (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> e83070fd (.)
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 0253339c (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> bc2abf99 (.)
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'php_unit_construct' => false,
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
        ],
        'function_declaration' => true,
        'blank_line_after_namespace' => true,
        'class_definition' => true,
        'elseif' => true,
    ])
    ->setFinder($finder)
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
;
>>>>>>> f3c337b1 (.)

return $config;
=======

return $config;
>>>>>>> 8fc3049b (first)
=======

return $config;
>>>>>>> e83070fd (.)
=======

return $config;
>>>>>>> 0253339c (first)
=======
;

return $config;
>>>>>>> bc2abf99 (.)
