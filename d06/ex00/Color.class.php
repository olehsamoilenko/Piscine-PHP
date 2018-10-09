<?php
class Color {
	static	$verbose = FALSE;
	public	$red;
	public	$green;
	public	$blue;

	function __construct($arr) {
		if (array_key_exists('rgb', $arr)) {
			$this->red = intval($arr['rgb']) / 65281 % 256;
			$this->green = intval($arr['rgb']) / 256 % 256;
			$this->blue = intval($arr['rgb']) % 256;
		}
		else if (array_key_exists('red', $arr) &&
		array_key_exists('green', $arr) &&
		array_key_exists('blue', $arr)) {
			$this->red = intval($arr['red']);
			$this->green = intval($arr['green']);
			$this->blue = intval($arr['blue']);
		}
		if (self::$verbose == TRUE) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n",
			$this->red, $this->green, $this->blue);
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
		echo PHP_EOL . $doc . PHP_EOL;
	}

	function __toString() {
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )",
			$this->red, $this->green, $this->blue));
	}

	function __destruct() {
		if (self::$verbose == TRUE) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n",
			$this->red, $this->green, $this->blue);
		}
	}
}
?>