<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude("node_modules")
    ->exclude("tests/_support/_generated")
    ->exclude("vendor")
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

$config->setRules(
    [
        "@PSR12" => true,
        "array_syntax" => ["syntax" => "short"],
        "binary_operator_spaces" => ["default" => "align"],
        "blank_line_before_statement" => true,
        "cast_spaces" => true,
        "combine_consecutive_unsets" => true,
        "linebreak_after_opening_tag" => true,
        "no_blank_lines_after_class_opening" => true,
        "no_blank_lines_after_phpdoc" => true,
        "no_spaces_around_offset" => true,
        "no_unused_imports" => true,
        "no_useless_else" => true,
        "no_useless_return" => true,
        "no_whitespace_before_comma_in_array" => true,
        "ordered_imports" => true,
        "ternary_to_null_coalescing" => true,
        "trailing_comma_in_multiline" => ["elements" => ["arrays"]],
        "trim_array_spaces" => true,
    ]
);

$config->setFinder($finder);

return $config;
