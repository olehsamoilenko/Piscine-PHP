<?php
	session_start();
	require_once('Ship.Class.php');
	setcookie('me', null, time(0));
	setcookie('enemy', null, time(0));
	// setcookie('map', null, time(0));
	session_destroy();
?>