#!/usr/bin/env php
<?php
if ($argc != 2)
	return;
$file =	fopen($argv[1], "r+");
if (!($file))
	return;
$text = fread($file, filesize($argv[1]));
$array = preg_split("/[><]/i", $text, -1, PREG_SPLIT_DELIM_CAPTURE);
var_dump($array);
fclose($file);