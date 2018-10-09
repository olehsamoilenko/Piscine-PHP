<?php
class Vertex {
	static	$verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	function __construct($arr) {

	}

	public static function doc() {
		$doc = file_get_contents(__DIR__ . "/Color.doc.txt");
		echo PHP_EOL . $doc . PHP_EOL;
	}

	function __destruct() {
		if (self::$verbose == TRUE) {

		}
	}
}
?>