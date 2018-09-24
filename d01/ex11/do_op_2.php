#!/usr/bin/php
<?php
function correct_operation($op) {
	if ($op != '+' && $op != '-' && $op != '*' && $op != '/' && $op != '%')
		return (FALSE);
	else
		return (TRUE);
}

if ($argc != 2) {
	print("Incorrect Parameters\n");
	exit();
}
$str = str_replace(" ", "", $argv[1]);
list($a, $op, $b) = sscanf($str, "%d%c%d");
if (!is_numeric($a) || !correct_operation($op) || !is_numeric($b)) {
	print("Syntax Error\n");
	exit;
}
switch ($op) {
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
		$res = $a / $b;
		break;
	case '%':
		$res = $a % $b;
		break;
}
print("$res\n");
// NOT FINISHED
?>