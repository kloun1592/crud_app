<?php
	require_once 'db/db_consts.php';
	require_once 'db/database.php';
	dbInitialConnect("computers");
	$query = "SELECT computer.name
	FROM computer
	INNER JOIN soft ON soft.name LIKE 'Dr.Web%'
	INNER JOIN soft_computer ON computer.id = soft_computer.computer_id AND soft.id = soft_computer.soft_id
	INNER JOIN manufacter ON manufacter.name = 'Taiwan'
	INNER JOIN computer_accessory ON computer.id = computer_accessory.computer_id
	INNER JOIN accessory ON accessory.id = computer_accessory.accessory_id;";
	$array = dbQueryGetResult($query);
	dbConnectClose();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
	<style type='text/css'>
		body {
			background: #76b852; /* fallback for old browsers */
			background: -webkit-linear-gradient(right, #76b852, #8DC26F);
			background: -moz-linear-gradient(right, #76b852, #8DC26F);
			background: -o-linear-gradient(right, #76b852, #8DC26F);
			background: linear-gradient(to left, #76b852, #8DC26F);
			font-family: "Roboto", sans-serif;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		.menu a
		{
			color: #fff;
			text-decoration: none;
			font-size: 18px;
		}
	</style>
</head>
<body>
	<div class="menu">
		<a href='<?php echo site_url('main/computers');?>'>Computers</a> |
		<a href='<?php echo site_url('main/soft');?>'>Soft</a> |
		<a href="<?php echo site_url('auth/logout'); ?>">Logout</a> |
		<a href="<?php echo site_url('auth/create_user'); ?>">Register new user</a> |
		<a href="<?php echo site_url('auth/'); ?>">All users</a> |
		<a href="<?php echo site_url('main/first_query'); ?>">First query</a> |
		<a href="<?php echo site_url('main/second_query'); ?>">Second query</a> |
		<a href="<?php echo site_url('main/third_query'); ?>">Third query</a>
	</div>
	<table>
		<thead>
			<th>Countries</th>
		</thead>
		<tbody>
			<?php
			foreach ($array as $row) {
				echo "<tr>";
				foreach ($row as $column) {
					echo "<td>$column</td>";
				}
				echo "</tr>";
			}    
			?>
		</tbody>
	</table>
	<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
	<script>
		$(document).ready(function()
		{
			$('table').DataTable();
		});
	</script>
</body>
</html>