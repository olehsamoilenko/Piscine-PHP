#!/usr/bin/php
<?php
include __DIR__ . "/../ex03/ft_split.php";

$arr = array();
for ($i = 1; $i < $argc; $i++) {
	$arr = array_merge($arr, ft_split($argv[$i]));
}
sort($arr);
foreach ($arr as $value) {
	print("$value\n");
}
?>