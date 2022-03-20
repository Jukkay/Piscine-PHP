#!/usr/bin/env php
<?php
print get_current_user() . "\t" . posix_ctermid() . "\t" .date('M j G:i', getlastmod()) . "\n";
$fd = fopen("/var/run/utmpx", "rb");
$binary = fread($fd, filesize("/var/run/utmpx"));
$array = unpack(sprintf('C%d', $filesize), $binary);
var_dump($array);
fclose($fd);