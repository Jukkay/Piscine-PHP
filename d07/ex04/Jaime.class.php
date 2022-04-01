<?php
class Jaime {

	function sleepWith($house) {
		if ($house instanceof Tyrion)
			print "Not even if I'm drunk !" . PHP_EOL;
		elseif ($house instanceof Cersei)
			print "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
		else
			print "Let's do this." . PHP_EOL;
	}
}