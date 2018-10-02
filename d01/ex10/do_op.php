#!/usr/bin/php
<?php
function error($message) {
	print("$message\n");
	exit;
}

if ($argc != 4) {
	error("Incorrect Parameters");
}
$op = trim($argv[2]);
switch ($op) {
	case '+':
		$res = $argv[1] + $argv[3];
		break;
	case '-':
		$res = $argv[1] - $argv[3];
		break;
	case '*':
		$res = $argv[1] * $argv[3];
		break;
	case '/':
		if ($argv[3] == 0)
			error("Dividing by zero");
		$res = $argv[1] / $argv[3];
		break;
	case '%':
		if ($argv[3] == 0)
			error("Dividing by zero");
		$res = $argv[1] % $argv[3];
		break;
	default:
		error("Incorrect Parameters");
		break;
}
print("$res\n");
?>