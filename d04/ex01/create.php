<?php
	if ($_POST["login"] != "" && $_POST["passwd"] != "" && $_POST["submit"] == "OK") {
		if (!file_exists("../private")) {
			mkdir("../private");
		}
		$len = 0;
		if (file_exists("../private/passwd")) {
			$data = unserialize(file_get_contents("../private/passwd"));
			foreach ($data as $user) {
				$len++;
				if ($user["login"] == $_POST["login"]) {
					echo("ERROR\n");
					return ;
				}
			}
		}
		$user["login"] = $_POST["login"];
		$user["passwd"] = hash(whirlpool, $_POST["passwd"]);
		$data[$len] = $user;
		file_put_contents("../private/passwd", serialize($data));
		echo("OK\n");
	}
	else {
		echo("ERROR\n");
	}
?>
