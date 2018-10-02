#!/usr/bin/php
<?php
include __DIR__ . "/../ex03/ft_split.php";

function is_alpha($a) {
	if ($a >= 'a' && $a <= 'z' || $a >= 'A' && $a <= 'Z') {
		return (TRUE);
	}
	else {
		return (FALSE);
	}
}

function is_bigger($a, $b) {
	if (is_alpha($a)) {
		if (is_alpha($b) && ord(strtolower($a)) - ord(strtolower($b)) > 0) {
			return (TRUE);
		}
		else { /* alpha is smaller then number or symbol */
			return (FALSE);
		}
	}
	else if (is_numeric($a)) {
		if (is_alpha($b) || is_numeric($b) && $a > $b) {
			return (TRUE);
		}
		else { /* alpha is smaller then symbol */
			return (FALSE);
		}
	}
	else if (is_alpha($b) || is_numeric($b) || $a > $b) { /* a is symbol */
		return (TRUE);
	}
	else {
		return (FALSE);
	}
}

function str_bigger($a, $b) {
	$i = 0;
	while (true) {
		if (ord($a[$i]) != 0 && ord($b[$i]) == 0) {
			return (TRUE);
		}
		else if (ord($a[$i]) == 0) {
			return (FALSE);
		}
		if (ord($a[$i]) - ord($b[$i]) != 0) {
			return (is_bigger($a[$i], $b[$i]));
		}
		$i++;
	}
}

$arr = array();
for ($i = 1; $i < $argc; $i++) {
	$arr = array_merge($arr, ft_split($argv[$i]));
}
for ($i = 0; $i < count($arr); $i++) {
	for ($j = 0; $j < count($arr); $j++) {
		if (str_bigger($arr[$j], $arr[$i])) {
			$buf = $arr[$i];
			$arr[$i] = $arr[$j];
			$arr[$j] = $buf;
		}
	}
}
foreach ($arr as $value) {
	print("$value\n");
}
?>