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
		if ($this->red < 0 || $this->red > 255 ||
		$this->green < 0 || $this->green > 255 ||
		$this->blue < 0 || $this->blue > 255) {
			$this->red = 0;
			$this->green = 0;
			$this->blue = 0;
		}
		if (self::$verbose == TRUE) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n",
			$this->red, $this->green, $this->blue);
		}
	}

	public function add($color) {
		return (new Color(array('red' => $this->red + $color->red,
								'green' => $this->green + $color->green,
								'blue' => $this->blue + $color->blue)));
	}

	public function sub($color) {
		return (new Color(array('red' => $this->red - $color->red,
								'green' => $this->green - $color->green,
								'blue' => $this->blue - $color->blue)));
	}

	public function mult($coef) {
		return (new Color(array('red' => $this->red * $coef,
								'green' => $this->green * $coef,
								'blue' => $this->blue * $coef)));
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