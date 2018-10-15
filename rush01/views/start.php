<?php
	session_start();
	require_once('Ship.Class.php');
	if (!array_key_exists('me', $_COOKIE)) {
		setcookie('me', serialize(new Ship(960, 0, 180)), time() + 3600);
		setcookie('enemy', serialize(new Ship(960, 1100, 0)), time() + 3600);
		
		setcookie('map', serialize($map), time() + 3600);
	}
	$me = unserialize($_COOKIE['me']);
	$enemy = unserialize($_COOKIE['enemy']);
	$answer = array(
		'top1' => $me->getTop(),
		'left1' => $me->getLeft(),
		'rotation1' => $me->getRotation(),
		'top2' => $enemy->getTop(),
		'left2' => $enemy->getLeft(),
		'rotation2' => $enemy->getRotation()
		// 'map' => $map
	);
	echo json_encode($answer);
?>