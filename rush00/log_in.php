<?php
function authorization($login, $password) {
	require_once('connect_db.php');
	$sql = "SELECT password FROM users WHERE login = '".$login."'";
	$sql = str_replace("$login", $login, $sql);
	$result = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_array($result);
	if ($row['password'] == hash('whirlpool', $password)) {
		mysqli_close($dbc);
		return (true);
	}
	mysqli_close($dbc);
	return (false);
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<style>
			input{
				border: 2px solid #1e5799;
			}
			#btn:hover{
				background: #7db9e8;
	
	
			}
			.form_reg {
				float: top;
			}
		</style>
	</head>
	<body>
		<div class = "form_reg">
			<form action="log_in.php" method="post">
				<table>
					<tr>
						<td>Login:</td>
						<td><input type="text" name="login" value=""></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" value=""></td>
					</tr>
				</table>
				<button type="submit" name="submit" value="OK">Submit</button>
			</form>
		</div>
		<div style="display: block">
			<?php
				session_start();
				if ($_POST['submit'] == "OK") {
					if (authorization($_POST['login'], $_POST['password']) == TRUE) {
						$_SESSION['user_registered'] = $_POST['login'];
						// setcookie("basket", array(), time() + 3600 * 24);
						header('Location: index.php');
						// print_r($_COOKIE);
						// echo "OK";
					}
					else {
						echo "Incorrect login or password";
						$_SESSION['user_registered'] = '';
						// echo "NO";
					}
				}
				// print_r($_SESSION);
			?>
		</div>
		<a href="create_account.html">Create an account</a><br />
		<a href="change_password.php">Change your password</a><br />
		<a href="del_user.html">Delete your account</a><br />
		<a href="index.php">Back to shopping</a>
	</body>
</html>