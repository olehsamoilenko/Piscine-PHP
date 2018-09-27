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
			setcookie($name, $value);
			break;
		case "get":
			echo "$_COOKIE[$name]\n";
			break;
		case "del":
			setcookie($name, "", time());
			break;
	}
	// test, read
?>
