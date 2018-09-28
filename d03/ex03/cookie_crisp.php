<?php
	foreach ($_GET as $key => $elem) {
		switch ($key) {
			case "action":
				$action = $elem;
				break;
			case "name":
				$name = $elem;
				break;
			case "value":
				$value = $elem;
				break;
		}
	}
	switch ($action) {
		case "set":
			setcookie($name, $value, time() + 3600 * 24);
			break;
		case "get":
			if ($_COOKIE[$name] != null) {
				echo "$_COOKIE[$name]\n";
			}
			break;
		case "del":
			setcookie($name, null, 0);
			break;
	}
?>
