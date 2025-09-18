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
;

return PhpCsFixer\Config::create()
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    ->setRules(array(
=======
    ->setRules([
>>>>>>> 8fc3049b (first)
=======
    ->setRules(array(
>>>>>>> e83070fd (.)
=======
    ->setRules([
>>>>>>> 0253339c (first)
=======
    ->setRules(array(
>>>>>>> bc2abf99 (.)
        '@Symfony' => true,
        'array_indentation' => true,
        'function_typehint_space' => true,
        'declare_equal_normalize' => true,
        'combine_consecutive_unsets' => true,
        'binary_operator_spaces' => ['align_double_arrow' => false],
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'php_unit_construct' => false,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        'braces'=>[
            'position_after_functions_and_oop_constructs'=>'same',
=======
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
>>>>>>> 8fc3049b (first)
=======
        'braces'=>[
            'position_after_functions_and_oop_constructs'=>'same',
>>>>>>> e83070fd (.)
=======
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
>>>>>>> 0253339c (first)
=======
        'braces'=>[
            'position_after_functions_and_oop_constructs'=>'same',
>>>>>>> bc2abf99 (.)
        ],
        'function_declaration' => true,
        'blank_line_after_namespace' => true,
        'class_definition' => true,
        'elseif' => true,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    ))
=======
    ])
>>>>>>> 8fc3049b (first)
=======
    ))
>>>>>>> e83070fd (.)
=======
    ])
>>>>>>> 0253339c (first)
=======
    ))
>>>>>>> bc2abf99 (.)
    ->setFinder($finder)
;
