#!/usr/bin/env php
<?php
while (1) {
	echo 'Enter a number: ';
	$n = trim(fgets(STDIN));
	if (feof(STDIN)) {
		echo "\n";
		break;
	}
	if (!(is_numeric($n))) {
		echo "'$n' is not a number\n";
		continue;
	}
	if ($n % 2 == 0)
		echo "The number $n is even\n";
	else
		echo "The number $n is odd\n";
}
?>