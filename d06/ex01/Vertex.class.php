<?php
require_once(__DIR__ . '/../ex00/Color.class.php');

class Vertex {
	static	$verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;

	function __toString() {
		if (self::$verbose == FALSE) {
			$c = '';
		}
		else {
			$c = ', ' . $this->getColor();
		}
		return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f%s )",
			$this->getX(), $this->getY(), $this->getZ(), $this->getW(), $c));
	}

	function __construct($kwargs) {
		if (array_key_exists('w', $kwargs)) {
			$this->setW($kwargs['w']);
		}
		if (array_key_exists('color', $kwargs)) {
			$this->setColor($kwargs['color']);
		}
		else {
			$this->setColor(new Color(array('rgb' => 0xffffff)));
		}
		if (array_key_exists('x', $kwargs) &&
		array_key_exists('y', $kwargs) &&
		array_key_exists('z', $kwargs)) {
			$this->setX($kwargs['x']);
			$this->setY($kwargs['y']);
			$this->setZ($kwargs['z']);
		}
		if (self::$verbose == TRUE) {
			echo $this . ' constructed' . PHP_EOL;
		}
	}

	public function getX() {
		return ($this->_x);
	}
	public function getY() {
		return ($this->_y);
	}
	public function getZ() {
		return ($this->_z);
	}
	public function getW() {
		return ($this->_w);
	}
	public function getColor() {
		return ($this->_color);
	}
	public function setX($value) {
		if (is_numeric($value)) {
			$this->_x = $value;
		}
	}
	public function setY($value) {
		if (is_numeric($value)) {
			$this->_y = $value;
		}
	}
	public function setZ($value) {
		if (is_numeric($value)) {
			$this->_z = $value;
		}
	}
	public function setW($value) {
		if (is_numeric($value)) {
			$this->_w = $value;
		}
	}
	public function setColor($value) {
		if ($value instanceof Color) {
			$this->_color = $value;
		}
	}

	public static function doc() {
		$doc = file_get_contents(__DIR__ . "/Vertex.doc.txt");
		echo $doc . PHP_EOL;
	}

	function __destruct() {
		if (self::$verbose == TRUE) {
			echo $this . ' destructed' . PHP_EOL;
		}
	}
}
?>