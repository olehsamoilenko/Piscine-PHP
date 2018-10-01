<?php
	function auth($login, $passwd) {
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach ($data as $user) {
			if ($login == $user["login"] && hash(whirlpool, $passwd) == $user["passwd"]) {
				return (TRUE);
			}
		}
		return (FALSE);
	}
?>
