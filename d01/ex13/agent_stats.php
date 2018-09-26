#!/usr/bin/php
<?php
$input = file("php://stdin");
unset($input[0]);
switch ($argv[1]) {
	case "average":
		
		foreach ($input as $line) {
			$data = explode(';', $line);
			if (is_numeric($data[1]) && $data[2] != "moulinette") {
				$sum += $data[1];
				$count++;
			}
		}
		print($sum / $count."\n");
		break;

	case "average_user":
		sort($input);
		foreach ($input as $line) {
			$data = explode(';', $line);
			if ($data[0] != $prev_user && $prev_user != "") {
				print($prev_user.":".$sum / $count."\n");
				$sum = 0;
				$count = 0;
			}
			if (is_numeric($data[1]) && $data[2] != "moulinette") {
				$sum += $data[1];
				$count++;
			}
			$prev_user = $data[0];
		}
		print($prev_user.":".$sum / $count."\n");
		break;
	
	case "moulinette_variance":
		sort($input);
		foreach ($input as $line) {
			$data = explode(';', $line);
			if ($data[0] != $prev_user && $prev_user != "") {
				print($prev_user.":".($sum / $count - $moulinette)."\n");
				$sum = 0;
				$count = 0;
			}
			if ($data[2] == "moulinette")
				$moulinette = $data[1];
			else if (is_numeric($data[1])) {
				$sum += $data[1];
				$count++;
			}
			$prev_user = $data[0];
		}
		print($prev_user.":".($sum / $count - $moulinette)."\n");
		break;
}
?>