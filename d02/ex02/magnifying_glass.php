#!/usr/bin/env php
<?php
if ($argc != 2)
	return;
$fd = fopen($argv[1], "r+");
$text = fread($fd, filesize($argv[1]));

$text = preg_replace_callback('/(<a href[^>]*title=")([^>]*)("[^>]*>)/i', function ($matches) { return $matches[1] . strtoupper($matches[2]) . $matches[3];}, $text);
$text = preg_replace_callback('/(<a href[^>]*>)([^<>]*)/i', function ($matches) { return $matches[1] . strtoupper($matches[2]);}, $text);
$text = preg_replace_callback('/(<img src[^>]*title=")([^>]*)("[^>]*>)/i', function ($matches) { return $matches[1] . strtoupper($matches[2]) . $matches[3];}, $text);
echo $text;
fclose($fd);
