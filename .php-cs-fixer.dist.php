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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 8fc3049b (first)
=======
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 53542950 (first)
=======
>>>>>>> 26424c5e (first)
=======
>>>>>>> c8cd1ec3 (first)
=======
>>>>>>> b7483fd0 (first)
=======
>>>>>>> e0005d7d (first)
=======
>>>>>>> 6907d18e (first)
=======
>>>>>>> 616a71c2 (first)
=======
>>>>>>> c6af2eee (first)
=======
>>>>>>> 8e6e7d4c (first)
=======
>>>>>>> 4658bb86 (first)
=======
>>>>>>> edbb3aab (first)
=======
>>>>>>> bcab6efe (first)
=======
>>>>>>> fec698af (first)
=======
>>>>>>> f862c51f (first)
=======
>>>>>>> 9997d18c (first)
=======
>>>>>>> 961ad402 (first)
=======
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
>>>>>>> e83070fd (.)
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
;
>>>>>>> 7e417e87 (first)
=======
;
>>>>>>> 53542950 (first)
=======
;
>>>>>>> 26424c5e (first)
=======
;
>>>>>>> c8cd1ec3 (first)
=======
;
>>>>>>> b7483fd0 (first)
=======
;
>>>>>>> e0005d7d (first)
=======
;
>>>>>>> 6907d18e (first)
=======
;
>>>>>>> 616a71c2 (first)
=======
;
>>>>>>> c6af2eee (first)
=======
;
>>>>>>> 8e6e7d4c (first)
=======
;
>>>>>>> 4658bb86 (first)
=======
;
>>>>>>> edbb3aab (first)
=======
;
>>>>>>> bcab6efe (first)
=======
;
>>>>>>> fec698af (first)
=======
;
>>>>>>> f862c51f (first)
=======
;
>>>>>>> 9997d18c (first)
=======
;
>>>>>>> 961ad402 (first)
=======
;
>>>>>>> dc18abbe (first)
=======
;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
>>>>>>> e83070fd (.)

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
        //'binary_operator_spaces' => ['align_double_arrow' => false],
=======
        // 'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 8fc3049b (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 7e417e87 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 53542950 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 26424c5e (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> c8cd1ec3 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> b7483fd0 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> e0005d7d (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 6907d18e (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 616a71c2 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> c6af2eee (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 8e6e7d4c (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 4658bb86 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> edbb3aab (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> bcab6efe (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> fec698af (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> f862c51f (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 9997d18c (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> 961ad402 (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> dc18abbe (first)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
        //'binary_operator_spaces' => ['align_double_arrow' => false],
>>>>>>> e83070fd (.)
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

return $config;
=======

return $config;
>>>>>>> 8fc3049b (first)
=======
;

return $config;
>>>>>>> 7e417e87 (first)
=======
;

return $config;
>>>>>>> 53542950 (first)
=======
;

return $config;
>>>>>>> 26424c5e (first)
=======
;

return $config;
>>>>>>> c8cd1ec3 (first)
=======
;

return $config;
>>>>>>> b7483fd0 (first)
=======
;

return $config;
>>>>>>> e0005d7d (first)
=======
;

return $config;
>>>>>>> 6907d18e (first)
=======
;

return $config;
>>>>>>> 616a71c2 (first)
=======
;

return $config;
>>>>>>> c6af2eee (first)
=======
;

return $config;
>>>>>>> 8e6e7d4c (first)
=======
;

return $config;
>>>>>>> 4658bb86 (first)
=======
;

return $config;
>>>>>>> edbb3aab (first)
=======
;

return $config;
>>>>>>> bcab6efe (first)
=======
;

return $config;
>>>>>>> fec698af (first)
=======
;

return $config;
>>>>>>> f862c51f (first)
=======
;

return $config;
>>>>>>> 9997d18c (first)
=======
;

return $config;
>>>>>>> 961ad402 (first)
=======
;

return $config;
>>>>>>> dc18abbe (first)
=======
;

return $config;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======

return $config;
>>>>>>> e83070fd (.)
