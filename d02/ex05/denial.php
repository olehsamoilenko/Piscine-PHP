#!/usr/bin/php
<?php
	if ($argc != 3 || !file_exists($argv[1]))
		exit;
	$fd = fopen($argv[1], 'r');
	$arr = array();
	while (true) {
		$line = fgetcsv($fd, 0, ';');
		if ($line == NULL) {
			break;
		}
		array_push($arr, $line);
	}
	$key_number = array_search($argv[2], $arr[0]);
	if ($key_number === FALSE)
		exit;
	for ($i = 1; $i < count($arr); $i++) {
		$key = $arr[$i][$key_number];
		$nom[$key] = $arr[$i][0];
		$prenom[$key] = $arr[$i][1];
		$mail[$key] = $arr[$i][2];
		$IP[$key] = $arr[$i][3];
		$pseudo[$key] = $arr[$i][4];
	}
	while (true) {
		echo "Enter your command: ";
		$command = fgets(STDIN);
		if ($command == null) {
			echo "\n";
			break ;
		}
		eval($command);
	}
?>