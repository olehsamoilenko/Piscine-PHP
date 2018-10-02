#!/usr/bin/php
<?php
$str = trim($argv[1]);
while (strstr($str, "  ")) {
	$str = str_ireplace("  ", " ", $str);
}
if ($str != NULL)
	print_r("$str\n");
?>