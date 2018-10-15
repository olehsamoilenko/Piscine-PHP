<?php
	$file = file_get_contents('list.csv');
	$file = preg_replace('/' . $_GET['key'] . ';.*\n/', '', $file);
	file_put_contents('list.csv', $file);
?>