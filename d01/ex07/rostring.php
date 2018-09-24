#!/usr/bin/php
<?php
if ($argc == 1)
	exit;
$str = trim($argv[1]);
while (strstr($str, "  ")) {
	$str = str_ireplace("  ", " ", $str);
}
$pos = strpos($str, " ");
if ($pos != 0) {
	$buf = substr($str, $pos + 1);
	$str = $buf." ".substr($str, 0, $pos);
}
print("$str\n");
?>