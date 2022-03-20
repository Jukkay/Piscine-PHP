#!/usr/bin/env php
<?php
$output = array();
for ($i = 1; $i < $argc; $i++) {

	$argv[$i] = trim($argv[$i], " \n\r\t\v\0");
	$array = explode(" ", $argv[$i], PHP_INT_MAX);
	$array = array_filter($array);
	$output = array_merge($output, $array);
}
sort($output);
$argc = count($output);
for ($i = 0; $i < $argc; $i++) {
	echo $output[$i];
	echo "\n";
}
?>