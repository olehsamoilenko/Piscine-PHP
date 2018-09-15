#!/usr/bin/php
<?php
$str = preg_replace("/ +/", " ", trim($argv[1]));
print_r("$str\n");
?>