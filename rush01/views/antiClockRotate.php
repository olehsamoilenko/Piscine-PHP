<?php
	include 'objParameters.php';
	$obj = unserialize($_COOKIE[$_GET['p']]);
	$obj->antiClockRotate();
	setcookie($_GET['p'], serialize($obj), time() + 3600);
	echo json_encode(objParameters($obj));
?>

