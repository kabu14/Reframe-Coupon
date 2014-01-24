<?php
require 'core/init.php';
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if ( empty($username) || empty($password) ) {
		$errors[] = 'Sorry, but we need your username and password';
	}
	else if ( $admins->admin_exists($username) === false) {
		$errors[] = 'Sorry, that username doesn\'t exist.';
	}
	else {
		$login = $admins->login($username, $password);

		if ( $login === false ) {
			$errors[] = 'Sorry, that username/password is invalid';
		} 
		else {
			// username and password is correct and the id of the admin is returned
			$_SESSION['id'] = $login;

			// redirect to the admin home page
			header('Location: home.php');
			exit();
		}
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Login</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Login</h1>
 
		<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
		<form method="post" action="">
			<h4>Username:</h4>
			<input type="text" name="username">
			<h4>Password:</h4>
			<input type="password" name="password">
			<br>
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html>