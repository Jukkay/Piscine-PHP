#!/usr/bin/env php
<?php

$str = trim($argv[1], " \n\r\t\v\0");
$array = explode(" ", $str, PHP_INT_MAX);
$array = array_filter($array);
array_push($array, array_shift($array)); // array_shift deletes first element and returns its value. Array_push adds given element to the end of the array.
for ($i = 0; $i < count($array); $i++) {
	echo $array[$i];
	if ($i < (count($array) - 1))
		echo " ";
}
echo "\n"
?>