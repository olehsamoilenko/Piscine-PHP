<?php
	session_start();
	session_destroy();
	
	$_SESSION['user_in_system'] = "";
	header('Location: index.php');
?>