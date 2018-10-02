#!/usr/bin/php
<?php
function error($message) {
	print("$message\n");
	exit;
}
if ($argc != 2) {
	error("Incorrect Parameters");
}
$str = str_replace(" ", "", $argv[1]);
$index = strpos($str, '+') + strpos($str, '-') + strpos($str, '*') + strpos($str, '/') + strpos($str, '%');
$a = substr($str, 0, $index);
$b = substr($str, $index + 1);
if (!is_numeric($a) || !is_numeric($b)) {
	error("Syntax Error");
}
switch ($str[$index]) {
	case '+':
		$res = $a + $b;
		break;
	case '-':
		$res = $a - $b;
		break;
	case '*':
		$res = $a * $b;
		break;
	case '/':
		if ($b == 0)
			error("Dividing by zero");
		$res = $a / $b;
		break;
	case '%':
		if ($b == 0)
			error("Dividing by zero");
		$res = $a % $b;
		break;
}
print("$res\n");
?>