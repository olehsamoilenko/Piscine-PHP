<!doctype html>
<html>
	<head>
		<style>
			table {
				width: 100%;
				table-layout: fixed;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<th id='id1'>ID</th>
				<th id='id2'>Login</th>
				<th id='id3'>Order</th>
				<th id='id4'>Order Date</th>
				<th id='id5'></th>
			</tr>
			<?php
				require_once('connect_db.php');
				$sql = "select orders.id, login, name, order_date from orders inner join users on users.id = orders.user_id inner join items on items.id = orders.item_id";
				$result = mysqli_query($dbc, $sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['login']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['order_date']."</td>";
					echo "<td>
					<a href=''>Remove order</a>
					</td>";
					echo "</tr>";
				}
				mysqli_close($dbc);
			?>
			</table>
	</body>
</html>