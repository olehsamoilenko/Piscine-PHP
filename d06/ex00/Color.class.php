<?php
class Color {
	static	$verbose = FALSE;
	public	$red;
	public	$green;
	public	$blue;

	function __toString() {
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )",
			$this->red, $this->green, $this->blue));
	}

	function __construct($kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			$this->red = (intval($kwargs['rgb']) & 0xff0000) >> 16;
			$this->green = (intval($kwargs['rgb']) & 0xff00) >> 8;
			$this->blue = intval($kwargs['rgb']) & 0xff;
		}
		else if (array_key_exists('red', $kwargs) &&
		array_key_exists('green', $kwargs) &&
		array_key_exists('blue', $kwargs)) {
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose == TRUE) {
			echo $this . ' constructed.' . PHP_EOL;
		}
	}

	public function add($rhs) {
		return (new Color(array('red' => $this->red + $rhs->red,
								'green' => $this->green + $rhs->green,
								'blue' => $this->blue + $rhs->blue)));
	}

	public function sub($rhs) {
		return (new Color(array('red' => $this->red - $rhs->red,
								'green' => $this->green - $rhs->green,
								'blue' => $this->blue - $rhs->blue)));
	}

	public function mult($f) {
		return (new Color(array('red' => $this->red * $f,
								'green' => $this->green * $f,
								'blue' => $this->blue * $f)));
	}

	public static function doc() {
		$doc = file_get_contents(__DIR__ . "/Color.doc.txt");
		echo $doc . PHP_EOL;
	}

	function __destruct() {
		if (self::$verbose == TRUE) {
			echo $this . ' destructed.' . PHP_EOL;
		}
	}
}
?>