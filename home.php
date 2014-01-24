<?php 
require 'core/init.php';
$general->logged_out_protect();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Home</title>
</head>
<body>	
	<div id="container">
		<ul>
 
			<li><a href="index.php">Home</a></li>
			<li><a href="logout.php">Logout</a></li>
 
		</ul>
	</div>

	<div class="main">
		<?php
			$results = $admins->gather('users');
		?>
		<table border="1">
			<tr>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>Code</td>
				<td>Subscribe (1 = yes)</td>
			</tr>
			<?php
				foreach ($results as $result) {
					echo "<tr>";
					echo "<td>{$result['name']}</td>";
					echo "<td>{$result['last']}</td>";
					echo "<td>{$result['email']}</td>";
					echo "<td>{$result['code']}</td>";
					echo "<td>{$result['subscribe']}</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>