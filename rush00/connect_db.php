<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "osamoile2000";
$db_name = "shop";
$db_port = "8081";

$dbc = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
if (!$dbc) {
	die('Connection error (' . mysqli_connect_errno() . ') ');
}
?>