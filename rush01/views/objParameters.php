<?php
	session_start();
	require_once('Ship.Class.php');
	function objParameters($obj) {
		return (
			array(
				'top' => $obj->getTop(),
				'left' => $obj->getLeft(),
				'bottom' => $obj->getBottom(),
				'right' => $obj->getRight(),
				'rotation' => $obj->getRotation(),
				'left_offset' => $obj->getLeftOffset(),
				'top_offset' => $obj->getTopOffset(),
				'shoot_distance' => $obj->getShootDistance(),
				'shoot_power' => $obj->getShootPower(),
				'status' => $obj->getStatus()
			)
		);
	}
?>