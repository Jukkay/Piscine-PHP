<?php
class Matrix {
	const IDENTITY = 'IDENTITY';
	const SCALE = 'SCALE preset';
	const RX = 'Ox ROTATION preset';
	const RY = 'Oy ROTATION preset';
	const RZ = 'Oz ROTATION preset';
	const TRANSLATION = 'TRANSLATION preset';
	const PROJECTION = 'PROJECTION preset';
	private $matrix = array(array(1,0,0,0), array(0,1,0,0), array(0,0,1,0), array(0,0,0,1));
	public static $verbose = False;
	private $type;

	function __construct($arr) {
		if (!is_array($arr) || !isset($arr['preset'])) // !isset($arr['vtc']) || !($arr['vtc'] instanceof Vector))
			return;
		if ($arr['preset'] == self::IDENTITY) {
			$this->type = $arr['preset'];
		}
		if ($arr['preset'] == self::SCALE && isset($arr['scale'])) {
			$this->type = $arr['preset'];
			$this->matrix[0][0] *= $arr['scale'];
			$this->matrix[1][1] *= $arr['scale'];
			$this->matrix[2][2] *= $arr['scale'];
		}
		if ($arr['preset'] == self::RX && isset($arr['angle'])) {
			$this->type = $arr['preset'];
			$this->matrix[1][1] = cos($arr['angle']);
			$this->matrix[1][2] = sin($arr['angle']);
			$this->matrix[2][1] = -sin($arr['angle']);
			$this->matrix[2][2] = cos($arr['angle']);
		}
		if ($arr['preset'] == self::RY && isset($arr['angle'])) {
			$this->type = $arr['preset'];
			$this->matrix[0][0] = cos($arr['angle']);
			$this->matrix[0][2] = -sin($arr['angle']);
			$this->matrix[2][0] = sin($arr['angle']);
			$this->matrix[2][2] = cos($arr['angle']);
		}
		if ($arr['preset'] == self::RZ && isset($arr['angle'])) {
			$this->type = $arr['preset'];
			$this->matrix[0][0] = cos($arr['angle']);
			$this->matrix[0][1] = sin($arr['angle']);
			$this->matrix[1][0] = -sin($arr['angle']);
			$this->matrix[1][1] = cos($arr['angle']);
		}
		if ($arr['preset'] == self::TRANSLATION && isset($arr['vtc']) && $arr['vtc'] instanceof Vector) {
			$this->type = $arr['preset'];
			$this->matrix[3][0] = $arr['vtc']->getValue('x');
			$this->matrix[3][1] = $arr['vtc']->getValue('y');
			$this->matrix[3][2] = $arr['vtc']->getValue('z');
		}
		if ($arr['preset'] == self::PROJECTION && isset($arr['fov']) && isset($arr['ratio']) && isset($arr['near']) && isset($arr['far'])) {
			$this->type = $arr['preset'];
			$fov = 1.0 / tan(deg2rad($arr['fov']) / 2.0);
			$this->matrix[0][0] = $fov / $arr['ratio'];
			$this->matrix[1][1] = $fov;
			$this->matrix[2][2] = -($arr['far'] + $arr['near']) / ($arr['far'] - $arr['near']);
			$this->matrix[2][3] = -1;
			$this->matrix[3][2] = (2 * $arr['far'] * $arr['near']) / ($arr['near'] - $arr['far']);
			$this->matrix[3][3] = 0;
		}
		if ($this->verbose)
			print "Matrix " . $this->type . " instance constructed" . PHP_EOL;
	}
	public function doc() {
		if (!file_exists('Matrix.doc.txt')) {
			print "File not found." . PHP_EOL;
			return;
		}
		echo file_get_contents('Matrix.doc.txt') . PHP_EOL;
	}

	public function __destruct() {
		if ($this->verbose)
			print "Matrix " . $this->type . " instance destructed" . PHP_EOL;
	}

	public function __toString() {

		return "M | vtcX | vtcY | vtcZ | vtxO" . PHP_EOL .
			  "-----------------------------" . PHP_EOL .
			  "x | " . number_format($this->matrix[0][0], 2) . " | " . number_format($this->matrix[1][0], 2) . " | " . number_format($this->matrix[2][0], 2) . " | " . number_format($this->matrix[3][0], 2) . PHP_EOL .
			  "y | " . number_format($this->matrix[0][1], 2) . " | " . number_format($this->matrix[1][1], 2) . " | " . number_format($this->matrix[2][1], 2) . " | " . number_format($this->matrix[3][1], 2) . PHP_EOL .
			  "z | " . number_format($this->matrix[0][2], 2) . " | " . number_format($this->matrix[1][2], 2) . " | " . number_format($this->matrix[2][2], 2) . " | " . number_format($this->matrix[3][2], 2) . PHP_EOL .
			  "w | " . number_format($this->matrix[0][3], 2) . " | " . number_format($this->matrix[1][3], 2) . " | " . number_format($this->matrix[2][3], 2) . " | " . number_format($this->matrix[3][3], 2) . PHP_EOL;
	}

	public function mult($arr) {
		if (!$arr instanceof Matrix)
			return;
		for($c = 0; $c < 4; $c++) {
			for($r = 0; $r < 4; $r++) {
			$prod += $arr[$c][$r] * $arr[$r][$c];
			}
		}
	}

	public function transformVertex() {}

}