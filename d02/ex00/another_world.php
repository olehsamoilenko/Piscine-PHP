#!/usr/bin/php
<?php
$str = preg_replace("/\s+/", " ", $argv[1]);
$str = preg_replace("/^ | $/", "", $str);
if ($str != NULL)
	print("$str\n");
?>