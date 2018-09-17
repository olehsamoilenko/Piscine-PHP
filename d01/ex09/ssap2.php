#!/usr/bin/php
<?php
include __DIR__ . "/../ex03/ft_split.php";

$arr = array();
for ($i = 1; $i < $argc; $i++) {
	$arr = array_merge($arr, ft_split($argv[$i]));
}

$alpha = array();
$numeric = array();
$sym = array();
foreach ($arr as $value) {
	if (ctype_alpha($value[0])) {
		array_push($alpha, $value);
	}
	else if (is_numeric($value)) {
		array_push($numeric, $value);
	}
	else {
		array_push($sym, $value);
	}
}
natcasesort($alpha);
sort($numeric, SORT_STRING);
sort($sym);
$arr = array_merge($alpha, $numeric, $sym);
// natcasesort($arr);
// sort($arr, SORT_FLAG_CASE);
// sort($arr, SORT_STRING | SORT_FLAG_CASE);
foreach ($arr as $value) {
	print("$value\n");
}
// $a = readline()
?>