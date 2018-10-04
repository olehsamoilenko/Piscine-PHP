#!/usr/bin/php
<?php
	if (!file_exists($argv[1]))
		exit;
	$file = file_get_contents($argv[1]);
	$arr = preg_split("#\n{2}#", $file);
	$time = array();
	$text = array();
	foreach ($arr as $elem) {
		$pos = strpos($elem, "\n");
		$pos2 = strpos($elem, "\n", $pos + 1);
		array_push($time, substr($elem, $pos + 1, $pos2 - $pos - 1));
		array_push($text, substr($elem, $pos2 + 1));
	}
	for ($i = 0; $i < count($time); $i++) {
		for ($j = 0; $j < count($time); $j++) {
			if (strcmp($time[$i], $time[$j]) < 0) {
				$buf = $time[$i];
				$time[$i] = $time[$j];
				$time[$j] = $buf;
				$buf = $text[$i];
				$text[$i] = $text[$j];
				$text[$j] = $buf;
			}
		}
	}
	for ($i = 0; $i < count($time); $i++) {
		printf("%d\n%s\n%s\n", $i + 1, $time[$i], $text[$i]);
		if ($i != count($time) - 1)
			print("\n");
	}
?>