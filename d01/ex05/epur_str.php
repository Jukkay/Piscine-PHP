#!/usr/bin/env php
<?php
$argv[1] = trim($argv[1], " \n\r\t\v\0");
$array = explode(" ", $argv[1], PHP_INT_MAX);
$array = array_filter($array);
$str = implode(" ", $array);
echo $str;
echo "\n";
?>