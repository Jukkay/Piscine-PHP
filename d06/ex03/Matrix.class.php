<?php
class Matrix {
	private const IDENTITY = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	private const SCALE = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	private const RX = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	private const RY = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	private const RZ = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	private const TRANSLATION = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	private const PROJECTION = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
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
		if (!file_exists('Matrix.doc.txt')) {
			print "File not found." . PHP_EOL;
			return;
		}
		echo file_get_contents('Matrix.doc.txt') . PHP_EOL;
	}
}