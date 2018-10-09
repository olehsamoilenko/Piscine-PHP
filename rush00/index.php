<?php
	function is_admin($login) {
		require_once('connect_db.php');
		$sql = "SELECT * FROM users WHERE login = '$login'";
		$sql = str_replace("$login", $login, $sql);
		$result = mysqli_query($dbc, $sql);
		$row = mysqli_fetch_array($result);
		if ($row['type'] == 'admin') {
			mysqli_close($dbc);
			return (true);
		}
		mysqli_close($dbc);
		return (false);
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Rush00</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="gallery_style.css">
	</head>
	<body>
		<div class="header">
			<div class ="header-main">
				<div class = "left-part_logo">
				   <a href="#">Store</a>
				</div>
				<div class="page">
                        <nav class="headernav">
                            <ul class="main-nav">
                                <?php
                                        session_start();
										echo "<li><a href='http://localhost:8081/rush00/basket.php'>Basket</a></li>";
										echo "<li><a href='http://localhost:8081/rush00/change_password.php'>Change password</a></li>";
										echo "<li><a href='http://localhost:8081/rush00/log_out_user.php'>Logout</a></li>";
                                        if ($_SESSION['user_registered']) {
                                            if (is_admin($_SESSION['user_registered']) == TRUE) {
                                                echo "<li><a href='http://localhost:8081/rush00/admin_page.html'>Admin page</a></li>";
                                            }
                                            echo "
                                                    <li>
                                                        <a href='' target='_blank'>".$_SESSION['user_registered']."</a>
                                                        <ul>
                                                            <li><a href='http://localhost:8081/rush00/change_password.php'>Change password</a></li>
                                                            <li><a href='http://localhost:8081/rush00/log_out_user.php'>Logout</a></li>
                                                         </ul> 
                                                    </li>";
                                        }

                                        else {
                                            echo "<li><a href='http://localhost:8081/rush00/log_in.php'>Sign In</a></li>".
                                            "<li><a href='http://localhost:8081/rush00/create_account.html'>Join</a></li>";
                                        };
					            ?>
					</ul>
                    </nav>
				</div>
			</div>
		</div>
		<div class="main">


            <div class="content">
                <div id="gallery">
					<a href='http://localhost:8081/rush00/categories.php?category=Pizza&page=1'>Pizza</a>
					<a href='http://localhost:8081/rush00/categories.php?category=Desserts&page=1'>Desserts</a>
					<a href='http://localhost:8081/rush00/categories.php?category=Chicken&page=1'>Chicken</a>
					<a href='http://localhost:8081/rush00/categories.php?category=Bread&page=1'>Bread</a>
					<a href='http://localhost:8081/rush00/categories.php?category=Drinks&page=1'>Drinks</a>
					<a href='http://localhost:8081/rush00/categories.php?category=Salad&page=1'>Salad</a>
                </div>
			</div>
		</div>
	</body>
</html>