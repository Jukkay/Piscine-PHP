#!/usr/bin/env php
<?php
$key = $argv[1];
$arg_string = str_replace(":", "=", implode('&', $argv)); // argv is imploded into str with & between and str_replace replaces : with = so they're interpreted as key value pairs by parse_str.
parse_str($arg_string, $array);
if (isset($array[$key]) &&  $array[$key]) {
	echo $array[$key] . "\n";
}
?>