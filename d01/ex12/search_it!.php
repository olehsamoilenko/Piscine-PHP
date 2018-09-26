#!/usr/bin/php
<?php
for ($i = 2; $i < $argc; $i++) {
	$elem = explode(':', $argv[$i]);
	if ($elem[0] == $argv[1])
		$res = $elem[1];
}
if ($res != NULL)
	print("$res\n");
?>