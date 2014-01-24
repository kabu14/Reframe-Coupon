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
		<p>Logged in!</p>
	</div>
</body>
</html>