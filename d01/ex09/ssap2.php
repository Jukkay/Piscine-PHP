#!/usr/bin/env php
<?php
$output = array();
$rest = array();
$num = array();
$alpha = array();
print_r($argv);
for ($i = 1; $i < $argc; $i++) {

	$argv[$i] = trim($argv[$i], " \n\r\t\v\0");
	$array = explode(" ", $argv[$i], PHP_INT_MAX);
	$array = array_filter($array);
	$output = array_merge($output, $array);
}
natcasesort($output);
$output = array_values($output);
print_r($output);
for ($i = 0; $i < count($output); $i++) {
	if (ctype_digit($output[$i][0])) {
		array_push($num, $output[$i]);
		continue;
	}
	if (ctype_alpha($output[$i][0])) {
		array_push($alpha, $output[$i]);
		continue;
	}
	array_push($rest, $output[$i]);
}
sort($num, 2); // sorts numbers as strings
$output = array_merge($alpha, $num, $rest);
$argc = count($output);
for ($i = 0; $i < $argc; $i++) {
	echo $output[$i];
	echo "\n";
}
?>