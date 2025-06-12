<?php

// disable error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__ . "/wiki_parser.php";


function print_pre($array, $html = false)
{
	// print "<pre>" . (!empty($html) ? htmlentities(print_r($array, 1), ENT_COMPAT, 'UTF-8') : print_r($array, 1)) . "</pre>\n";
	var_export(json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}


$contents = file_get_contents(__DIR__ . "/sample_input.txt");


$wikipedia_syntax_parser = new Jungle_WikiSyntax_Parser($contents, "George Harrison");

$parsed_wiki_syntax = $wikipedia_syntax_parser->parse();

print_pre($parsed_wiki_syntax, true);
