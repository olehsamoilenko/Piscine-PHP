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
	$field0 = $arr[0][0]; /* nom */
	$field1 = $arr[0][1]; /* prenom */
	$field2 = $arr[0][2]; /* mail */
	$field3 = $arr[0][3]; /* IP */
	$field4 = $arr[0][4]; /* pseudo */
	for ($i = 1; $i < count($arr); $i++) {
		$key = $arr[$i][$key_number];
		$$field0[$key] = $arr[$i][0];
		$$field1[$key] = $arr[$i][1];
		$$field2[$key] = $arr[$i][2];
		$$field3[$key] = $arr[$i][3];
		$$filed4[$key] = $arr[$i][4];
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