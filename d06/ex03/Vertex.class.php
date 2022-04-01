<?php
require_once 'Color.class.php';
class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = False;

	function __construct($arr) {
		if (!is_array($arr) || !isset($arr['x'], $arr['y'], $arr['z']))
			return;
		if (!isset($arr['w']))
			$arr['w'] = 1.0;
		if (isset($arr['color']) && $arr['color'] instanceof Color)
			$this->_color = $arr['color'];
		else
			$this->_color = new Color(array('rgb' => 16777215));
		$this->_x = $arr['x'];
		$this->_y = $arr['y'];
		$this->_z = $arr['z'];
		$this->_w = $arr['w'];
		if (self::$verbose)
			print "Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z: "  . number_format($this->_z, 2) . ", w: "  . number_format($this->_w, 2) . ", " . $this->_color . " ) constructed" . PHP_EOL;
	}
	public function doc() {
		if (!file_exists('Vertex.doc.txt')) {
			print "File not found." . PHP_EOL;
			return;
		}
		echo file_get_contents('Vertex.doc.txt') . PHP_EOL;
	}
	public function __toString() {
		if (self::$verbose)
			return "Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z: "  . number_format($this->_z, 2) . ", w: "  . number_format($this->_w, 2) . ", " . $this->_color . " )";
		else
			return "Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z: "  . number_format($this->_z, 2) . ", w: "  . number_format($this->_w, 2) . " )";
	}
	public function setValue($type, $value) {
		if (is_numeric($value)) {
			if ($value < 0) $value = 0;
			if ($value > 255) $value = 255;
			switch ($type) {
				case 'x':
					$this->_x = $value;
					break;
				case 'y':
					$this->_y = $value;
					break;
				case 'z':
					$this->_z = $value;
					break;
				case 'w':
					$this->_w = $value;
					break;
			}
			return;
		}
		if (is_array($value))
			$this->_color = new Color($value);
	}

	public function getValue($type) {
		switch ($type) {
			case 'x':
				return $this->_x;
			case 'y':
				return $this->_y;
			case 'z':
				return $this->_z;
			case 'w':
				return $this->_w;
			case 'color':
				return $this->_color;
		}
	}

	function __destruct() {
	if (self::$verbose)
		print "Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z: "  . number_format($this->_z, 2) . ", w: "  . number_format($this->_w, 2) . ", " . $this->_color . " ) destructed" . PHP_EOL;
	}

}

?>