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
				<th id='id3'>Registration date</th>
				<th id='id4'></th>
			</tr>
			<?php
				require_once('connect_db.php');
				$sql = "SELECT id, login, reg_date FROM users WHERE type != 'admin'";
				$result = mysqli_query($dbc, $sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['login']."</td>";
					echo "<td>".$row['reg_date']."</td>";
					echo "<td>
					<a href='http://localhost:8081/rush00/del_user.php?
					id=".$row['id']."'>Remove user</a>
					</td>";
					echo "</tr>";
				}
				mysqli_close($dbc);
			?>
			</table>
	</body>
</html>