<?php
	if ($_POST["login"] != NULL && $_POST["oldpw"] != NULL && $_POST["newpw"] != NULL && $_POST["submit"] == "OK") {
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach ($data as $key => $user) {
			if ($user["login"] == $_POST["login"] && $user["passwd"] == hash(whirlpool, $_POST["oldpw"])) {
				$data[$key]["passwd"] = hash(whirlpool, $_POST["newpw"]);
				file_put_contents("../private/passwd", serialize($data));
				echo("OK\n");
				return ;
			}
		}
	}
	echo ("ERROR\n");
?>
