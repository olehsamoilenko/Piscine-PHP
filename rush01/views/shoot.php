<?php
	error_reporting(E_ALL);
	session_start();
	require_once('Ship.Class.php');
	if ($_GET['p'] == 'me') {
		$weapon = unserialize($_COOKIE['me']);
		$opponent = unserialize($_COOKIE['enemy']);
	}
	else {
		$weapon = unserialize($_COOKIE['enemy']);
		$opponent = unserialize($_COOKIE['me']);
	}
	$startLeft = $weapon->getLeft() + $weapon->getLeftOffset();
	$startTop = $weapon->getTop() + $weapon->getTopOffset();
	$endLeft = $startLeft;
	$endTop = $startTop;
	$shoot_status = 0;
	for ($i = 0; $i < $weapon->getShootDistance() / 10; $i++) {
		if ($weapon->getRotation() == 0) {
			$endTop -= 10;
		}
		else if ($weapon->getRotation() == 90) {
			$endLeft += 10;
		}
		if ($weapon->getRotation() == 180) {
			$endTop += 10;
		}
		else if ($weapon->getRotation() == 270) {
			$endLeft -= 10;
		}
		if ($endTop >= $opponent->getTop() && $endTop <= $opponent->getBottom() &&
		$endLeft >= $opponent->getLeft() && $endLeft <= $opponent->getRight()) {
			$shoot_status = 1;
		}
	}
	$answer = array(
		'top' => $weapon->getTop(),
		'left' => $weapon->getLeft(),
		'rotation' => $weapon->getRotation(),
		'left_offset' => $weapon->getLeftOffset(),
		'top_offset' => $weapon->getTopOffset(),
		'shoot_distance' => $weapon->getShootDistance(),
		// 'startLeft' => $startLeft,
		// 'startTop' => $startTop,
		// 'endLeft' => $startLeft,
		// 'endTop' => $endTop,
		'shoot_status' => $shoot_status
	);
	echo json_encode($answer);
?>