#!/usr/bin/php
<?php
	$file = file_get_contents('map');
	$map = explode("\n", $file);
	print_r($map);
?>
