#!/usr/bin/php
<?php
$str = trim($argv[1]);
while (strstr($str, "  ")) {
	$str = str_ireplace("  ", " ", $str);
}
print_r("$str\n");
?>