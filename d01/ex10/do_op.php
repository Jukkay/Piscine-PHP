#!/usr/bin/env php
<?php
if ($argc != 4)
	return (print "Incorrect Parameters\n");
$num1 = trim($argv[1], " \n\r\t\v\0");
$operator = trim($argv[2], " \n\r\t\v\0");
$num2 = trim($argv[3], " \n\r\t\v\0");
if ($operator == '+') echo $result = $num1 + $num2;
if ($operator == '-') echo $result = $num1 - $num2;
if ($operator == '*') echo $result = $num1 * $num2;
if ($operator == '/') echo $result = $num1 / $num2;
if ($operator == '%') echo $result = $num1 % $num2;
echo "\n";
?>