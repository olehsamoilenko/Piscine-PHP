<?php
session_start();
require_once('connect_db.php');
// var_dump($dbc);
print_r($_POST);
if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['password']){
	$match = false;
	$sql = "SELECT id, login FROM users";
	$result = mysqli_query($dbc, $sql);
	echo "test";
	if (mysqli_num_rows($result) > 0) {
		while (($row = mysqli_fetch_assoc($result)) != NULL) {
			var_dump($row);
			if ($row['login'] == $_POST['login']) {
				echo "User exsist .<br/>";
				$match = true;
				break;
			}
		}
		echo "User exists<br/>";
	}
	if (!$match) {
		$login = $_POST['login']; echo $login."<br/>";
		$pass = $_POST['password']; echo $pass."<br/>";
		$sql =	"INSERT INTO users (login, password, type) VALUES ('$login', '$pass', 'common')";
		$sql = str_replace("$login", $login, $sql);
		$sql = str_replace("$pass", hash('whirlpool', $pass), $sql);
		if (!mysqli_query($dbc, $sql)) {
			echo mysqli_error($dbc);
		} else {
			header('Location: log_in.php');
		// echo "SUCCESS<br/>";
		}
	}
	mysqli_close($dbc);
}
?>
