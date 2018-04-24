<?php

	session_start();

	include_once('../includes/connection.php');

	if (isset($_SESSION['logged_in'])) {
		// checks if logged in, if true it will display index
		header('Location: menu.php');
?>





<?php

} else {
	// display login

	//performs validation
	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if(empty($username) or empty($password)) {
			$error = 'All fields are required!';
		} else {
			$query = $pdo->prepare("SELECT * FROM users WHERE user_name= ? AND user_password= ?");
			
			//binding variable from the ?'s above'
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num  = $query->rowCount();

			if($num ==1) {
				//user entered correct details
				$_SESSION['logged_in'] = true;
				//reloads the page
				header('Location: index.php');
				exit();

			} else {
				// user entered false details
				$error = 'Invaild Username or Password!';

			}

		}

	}

	?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

	<body>
		<div class="container">
			<div class="row justify-content-center">
				<a href="index.php" id="logo">CMS</a>
				<br /><br />
			</div>
			<div class="row justify-content-center">
			<!-- If an error occurs the error will be displayed-->
			<?php if (isset($error)) { ?>
			
				<small style="color:#aa0000;"><?php echo $error; ?> </small>
				<br /><br />
			
			<?php } ?>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-6">
					<form class="form-signin" action="index.php" method="post" autocomplete="off">
						<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

						<input type="text" name="username" placeholder="Username" class="form-control"/>
						<br />
						<input type="password" name="password" placeholder="Password" class="form-control"/>
						<br />
						<input type="submit" value="Login" class="btn btn-lg btn-primary btn-block"/>

					</form>
				</div>
			</div>
		</div>
	</body>
</html>








	<?php


}

?>