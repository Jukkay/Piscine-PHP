<?php
class Tyrion {

	function sleepWith($house) {
		if ($house instanceof Jaime || $house instanceof Cersei)
			print "Not even if I'm drunk !" . PHP_EOL;
		else
			print "Let's do this." . PHP_EOL;
	}
}