#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Athens');
	$fd = fopen("/var/run/utmpx", 'r');
	fread($fd, 1256);
	$list = array();
	while(($line = fread($fd, 628)) != NULL) {
		$arr = unpack("a256user/a4id/a32line/ipid/itype/itermination/iexit", $line);
		array_push($list, $arr);
	}
	foreach ($list as $elem) {
		if ($elem["type"] == 7) {
			printf("%-9s%-9s%-9s \n", trim($elem["user"]), trim($elem["line"]), date("M  j H:i", $elem["termination"]));
		}
	}
	fclose($fd);
?>