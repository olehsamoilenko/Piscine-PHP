<?php
	session_start();
	require_once('Ship.Class.php');
	$obj = unserialize($_COOKIE[$_GET['p']]);
	$answer = array(
		'top' => $obj->getTop(),
		'left' => $obj->getLeft(),
		'rotation' => $obj->getRotation(),
		'left_offset' => $obj->getLeftOffset(),
		'top_offset' => $obj->getTopOffset(),
		'shoot_distance' => $obj->getShootDistance()
	);
	echo json_encode($answer);
?>