#!/usr/bin/env php
<?php

if ($argc != 2)
	return (print "Incorrect Parameters\n");
$argv[1] = preg_replace("/\s+/", "", $argv[1]); // remove whitespace from in and outside of the string
$array = preg_split("/([\+\-\*\/\%])/", $argv[1], -1, PREG_SPLIT_DELIM_CAPTURE); // split to array with any of the allowed operators as delimiter and keep the delimiter.
if ( !(is_numeric($array[0])) || !(is_numeric($array[2])) )
	return (print "Syntax Error\n");
if ($array[1] == '+') echo $array[0] + $array[2];
else if ($array[1] == '-') echo $array[0] - $array[2];
else if ($array[1] == '*') echo $array[0] * $array[2];
else if ($array[1] == '/') echo $array[0] / $array[2];
else if ($array[1] == '%') echo $array[0] % $array[2];
else
	return (print "Syntax Error\n");
echo "\n";
?>