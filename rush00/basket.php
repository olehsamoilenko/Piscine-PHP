<html>
	<head>
		<style>
			table {
				width: 50%;
				
				table-layout: fixed;
				text-align: center;
			}
			form {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<table align="center">
			<?php
			if (count($_SESSION['basket']) == 0) {
				$_SESSION['basket'] = array();
				session_start();
			}
			
			// if ($_GET['action'] == 'del') {
			// 	$sql = "SELECT id FROM users WHERE login='admin'";
			// 	$result = mysqli_query($dbc, $sql);
			// 	$row = mysqli_fetch_array($result);
			// 	var_dump($_SESSION['basket']);
			// 	foreach ($_SESSION['basket'] as $elem) {
			// 		$sql = "insert into orders(user_id,item_id) values(".$row['id'].",".$elem['item_id'].")";
			// 		echo $sql."<br>";
			// 		mysqli_query($dbc, $sql);
			// 	}
			// }

			array_push($_SESSION['basket'], $_GET['item_id']);
			require_once('connect_db.php');
			// var_dump($dbc);
			$sum = 0;
			foreach($_SESSION['basket'] as $item) {
				$sql = "SELECT * FROM items WHERE id = ".$item;
				$result = mysqli_query($dbc, $sql);
				$row = mysqli_fetch_array($result);
				if ($row['name'] != NULL) {
					echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['price']."₴</td>";
					echo "<td><img height=50px src='".$row['img']."'></td>";
					echo "</tr>";
					$sum += $row['price'];
				}
			}
			echo "</table>";
			echo "<div style='text-align: center'><a><b>Total sum: ".$sum."₴</b></a></div>";
			mysqli_close($dbc);
			?>
		<form method="get" action="http://localhost:8081/rush00/basket.php?action=del">
			<button type='submit' name='action' value='del'>Submit</button>
		</form>
		<div style="text-align: center">
			<a href='http://localhost:8081/rush00/categories.php?category=Pizza&page=3'>Go back shoping</a></div>
	<body>
</html>