<?php
error_reporting(E_ALL);
class Matrix {
	const IDENTITY = 0;
	const SCALE = 1;
	const RX = 2;
	const RY = 3;
	const RZ = 4;
	const TRANSLATION = 5;
	const PROJECTION = 6;
	static	$verbose = FALSE;
	private $_m;

	function __toString() {
		return (sprintf(
			"M | vtcX | vtcY | vtcZ | vtxO\n" .
			"-----------------------------\n" .
			"x | %.2f | %.2f | %.2f | %.2f\n" .
			"y | %.2f | %.2f | %.2f | %.2f\n" .
			"z | %.2f | %.2f | %.2f | %.2f\n" .
			"w | %.2f | %.2f | %.2f | %.2f",
			$this->_m['x']->getX(), $this->_m['y']->getX(), $this->_m['z']->getX(), $this->_m['o']->getX(),
			$this->_m['x']->getY(), $this->_m['y']->getY(), $this->_m['z']->getY(), $this->_m['o']->getY(),
			$this->_m['x']->getZ(), $this->_m['y']->getZ(), $this->_m['z']->getZ(), $this->_m['o']->getZ(),
			$this->_m['x']->getW(), $this->_m['y']->getW(), $this->_m['z']->getW(), $this->_m['o']->getW()
		));
	}

	function __construct($kwargs) {
		if (array_key_exists('preset', $kwargs)) {
			if ($kwargs['preset'] == self::IDENTITY) {
				$this->_m = $this->identity();
			}
			if ($kwargs['preset'] == self::SCALE &&
				array_key_exists('scale', $kwargs)) {
				
			}
			if (($kwargs['preset'] == self::RX ||
				$kwargs['preset'] == self::RY ||
				$kwargs['preset'] == self::RZ) &&
				array_key_exists('angle', $kwargs)) {
				
			}
			if ($kwargs['preset'] == self::TRANSLATION &&
				array_key_exists('vtc', $kwargs)) {
				$this->_m = $this->translation($kwargs['vtc']);
			}
			if ($kwargs['preset'] == self::PROJECTION &&
				array_key_exists('fov', $kwargs) &&
				array_key_exists('ratio', $kwargs) &&
				array_key_exists('near', $kwargs) &&
				array_key_exists('far', $kwargs)) {
			}
		}
	}

	public function identity() {
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 0));
		$dest = new Vertex(array('x' => 1, 'y' => 0, 'z' => 0, 'w' => 0));
		$vtcX = new Vector(array('dest' => $dest, 'orig' => $orig));
		$dest = new Vertex(array('x' => 0, 'y' => 1, 'z' => 0, 'w' => 0));
		$vtcY = new Vector(array('dest' => $dest, 'orig' => $orig));
		$dest = new Vertex(array('x' => 0, 'y' => 0, 'z' => 1, 'w' => 0));
		$vtcZ = new Vector(array('dest' => $dest, 'orig' => $orig));
		$dest = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		$vtcO = new Vector(array('dest' => $dest, 'orig' => $orig));
		return (array('x' => $vtcX, 'y' => $vtcY, 'z' => $vtcZ, 'o' => $vtcO));
	}

	public function translation($vtc) {
		$matrix = $this->identity();
		$matrix['o'] = $vtc;
		return ($matrix);
	}

	public static function doc() {
		$doc = file_get_contents(__DIR__ . "/Matrix.doc.txt");
		echo PHP_EOL . $doc . PHP_EOL;
	}

	function __destruct() {
		if (self::$verbose == TRUE) {
			// echo $this . ' destructed.' . PHP_EOL;
		}
	}
}
?>