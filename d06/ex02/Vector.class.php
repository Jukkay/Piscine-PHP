<?php
class Vector {
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	public static $verbose = False;

	function __construct($arr) {
		if (!is_array($arr) || !($arr['dest'] instanceof Vertex))
			return;
		if (!isset($arr['orig']) || !($arr['orig'] instanceof Vertex))
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		else
			$orig = $arr['orig'];
		$dest = $arr['dest'];
		$this->_x = $dest->getValue('x') - $orig->getValue('x');
		$this->_y = $dest->getValue('y') - $orig->getValue('y');
		$this->_z = $dest->getValue('z') - $orig->getValue('z');
		$this->_w = $dest->getValue('w') - $orig->getValue('w');
		if (self::$verbose)
			print "Vector( x:" . number_format($this->_x, 2, ".", "") . ", y:" . number_format($this->_y, 2, ".", "") . ", z:"  . number_format($this->_z, 2, ".", "") . ", w:"  . number_format($this->_w, 2, ".", "") . " ) constructed" . PHP_EOL;
	}
	public function doc() {
		if (!file_exists('Vector.doc.txt')) {
			print "File not found." . PHP_EOL;
			return;
		}
		echo file_get_contents('Vector.doc.txt') . PHP_EOL;
	}
	public function magnitude() {
		return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
	}
	public function normalize() {
		$mag = $this->magnitude();
		if ($mag <= 0)
			return;
		if ($mag == 1)
			return clone $this;
		$dest = new Vertex(array('x' => $this->_x / $mag , 'y' => $this->_y / $mag,'z' => $this->_z / $mag));
		return new Vector(array('dest' => $dest));
	}
	public function add($rhs) {
		if (!($rhs instanceof Vector))
			return;
		$dest = new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z));
		return new Vector(array('dest' => $dest));
	}
	public function sub($rhs) {
		if (!($rhs instanceof Vector))
			return;
		$dest = new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z));
		return new Vector(array('dest' => $dest));
	}
	public function opposite() {
		$dest = new Vertex(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z));
		return new Vector(array('dest' => $dest));
	}
	public function scalarProduct($k) {
		if (!isset($k))
			return;
		$dest = new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k));
		return new Vector(array('dest' => $dest));
	}
	public function dotProduct($rhs) {
		if (!($rhs instanceof Vector))
			return;
		return $this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z;
	}
	public function cos($rhs) {
		if (!($rhs instanceof Vector))
			return;
		return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
	}
	public function crossProduct($rhs) {
		if (!($rhs instanceof Vector))
			return;
		$dest = new Vertex(array('x' => ($this->_y * $rhs->_z) - ($this->_z * $rhs->_y), 'y' => ($this->_z * $rhs->_x) - ($this->_x * $rhs->_z), 'z' => ($this->_x * $rhs->_y) - ($this->_y * $rhs->_x)));
		return new Vector(array('dest' => $dest));
	}
	public function __toString() {
		return "Vector( x:" . number_format($this->_x, 2, ".", "") . ", y:" . number_format($this->_y, 2, ".", "") . ", z:"  . number_format($this->_z, 2, ".", "") . ", w:"  . number_format($this->_w, 2, ".", "") . " )";
	}

	function __destruct() {
	if (self::$verbose)
		print "Vector( x:" . number_format($this->_x, 2, ".", "") . ", y:" . number_format($this->_y, 2, ".", "") . ", z:"  . number_format($this->_z, 2, ".", "") . ", w:"  . number_format($this->_w, 2, ".", "") . " ) destructed" . PHP_EOL;
	}

}

?>