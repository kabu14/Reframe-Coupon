<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Coupon</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="coupon.php">Coupon</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
	</div>
	<div class="main">
		<h1>Enter in the fields for a coupon</h1>
		<?php
			if ( !empty($errors) ) {
				echo '<p>' . implode('</p><p>', $errors) . '</p>';
			}
		?>
		<form action="" method="post">
			<ul>
				<li>
					<label for="name" class="required">First Name:</label>
					<input type="text" name="name" id="name" maxlength="20" placeholder="First Name..." value="<?= isset($_POST['name']) ? htmlentities($_POST['name']) : '' ?>" required/>
				</li>

				<li>
					<label for="last" class="required">Last Name:</label>
					<input type="text" name="last" id="last" maxlength="20" placeholder="Last Name..." value="<?= isset($_POST['last']) ? htmlentities($_POST['last']) : '' ?>" required/>
				</li>

				<li>
					<label for="email" class="required">Email:</label>
					<input type="text" name="email" id="email" maxlength="50" placeholder="email@email.com" value="<?= isset($_POST['email']) ? htmlentities($_POST['email']) : '' ?>" required/>
				</li>
				<li>
					<input type="submit" value="submit">
				</li>
			</ul>
		</form>
	</div>
</body>
</html>