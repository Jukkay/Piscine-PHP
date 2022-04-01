<?php
class Color {
	public $red;
	public $green;
	public $blue;
	public static $verbose = False;

	function __construct($arr = array('rgb' => 0 , 'red' => 0, 'green' => 0, 'blue' => 0)) {
		if (isset($arr['rgb'])) {
			$this->red = ($arr['rgb'] & 16711680) >> 16;
			$this->green = ($arr['rgb'] & 65280) >> 8;
			$this->blue = $arr['rgb'] & 255;
		}
		else {
			$this->red = (int)$arr['red'];
			$this->green = (int)$arr['green'];
			$this->blue = (int)$arr['blue'];
		}
		if (self::$verbose)
			print "Color( red: " . $this->red . " green: " . $this->green . " blue: "  . $this->blue . " ) constructed." . PHP_EOL;
	}
	public function doc() {
		if (!file_exists('Color.doc.txt')) {
			print "File not found." . PHP_EOL;
			return;
		}
		echo file_get_contents('Color.doc.txt') . PHP_EOL;
	}
	public function __toString() {
		return "Color( red: " . sprintf('%3d' ,$this->red) . " green: " . sprintf('%3d' ,$this->green) . " blue: "  . sprintf('%3d' ,$this->blue) . " )";
	}
	public function add($object) {
		$newred = $this->red + $object->red;
		$newgreen = $this->green + $object->green;
		$newblue = $this->blue + $object->blue;
		if ($newred > 255)
			$newred = 255;
		if ($newgreen> 255)
			$newgreen = 255;
		if ($newblue > 255)
			$newblue = 255;
		$new = new Color(array( 'red' => $newred, 'green' => $newgreen , 'blue' => $newblue));
		return $new;
	}
	public function sub($object) {
		$newred = $this->red - $object->red;
		$newgreen = $this->green - $object->green;
		$newblue = $this->blue - $object->blue;
		if ($newred < 0)
			$newred = 0;
		if ($newgreen < 0)
			$newgreen = 0;
		if ($newblue < 0)
			$newblue = 0;
		$new = new Color(array( 'red' => $newred, 'green' => $newgreen , 'blue' => $newblue));
		return $new;
	}
	public function mult($float) {
		$newred = $this->red * $float;
		$newgreen = $this->green * $float;
		$newblue = $this->blue * $float;
		if ($newred > 255)
			$newred = 255;
		if ($newgreen> 255)
			$newgreen = 255;
		if ($newblue > 255)
			$newblue = 255;
		$new = new Color(array( 'red' => $newred, 'green' => $newgreen , 'blue' => $newblue));
		return $new;
	}
	function __destruct() {
	if (self::$verbose)
		print "Color( red: " . $this->red . " green: " . $this->green . " blue: "  . $this->blue . " ) destructed.". PHP_EOL;
	}

}

?>