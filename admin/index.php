<?php

session_start();
include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])){
	// display index
} else {
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		if ( empty($username) or empty($password) ) {
			$error = 'All fields are required!';
		}
		else {
			$query = $pdo -> prepare("SELECT * FROM users WHERE u_name = ? AND u_password = ?"); 
			$query	->	bindValue(1, $username);
			$query	->	bindValue(2, $password);
			
			$query	->	execute();
			
			$num = $query	-> rowCount();
			
			if ($num == 1) {
				// user entered correct details
				$_SESSION['logged_in'] = true;
				
				header('location: index.php');
				exit();
;			}
			else {
				// user entered false details
				$error	=	'Incorrect details! There is no such username in the DB.';
			}
		}
	}
	?>

	<html>
	
		<head>
			
			<title>GPB CMS</title>
			<link rel="stylesheet" href="../assets/styles.css" />
		</head>
		
		<body>

			<div class="container">
				<a href="index.php" id="logo"> Admin login </a>
				<br />
				<br />
				
				<?php if (isset($error)) { ?>
					<small style="color:#aa0000;">
						<?php echo $error; ?>
					</small>
					<br />
					<br />
				<?php }?>

				<form action="index.php" method="post" autocomplete ="off">
					<input type="text" name="username" placeholder="username" />
					<input type="password" name="password" placeholder="password" />
					<input type="submit" value="Login" />
				</form>
			</div>
		
		</body>

	</html>
	
	<?php
}

?>