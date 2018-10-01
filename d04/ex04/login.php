<?php
	include("auth.php");

	session_start();
	if (auth($_GET["login"], $_GET["passwd"])) {
		echo ("OK\n");
		$_SESSION["loggued_on_user"] = $_GET["login"];
	}
	else {
		$_SESSION["loggued_on_user"] = "";
		echo ("ERROR\n");
	}
?>
