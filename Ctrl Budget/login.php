<?php
	if (isset($_SESSION['email'])) {
		header('location: home.php');
	}
	else{
		require 'includes/common.php';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/home.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
			include 'includes/header.php';
		?>
		<div class="content top centered">
		<div class="container">
				<div class="col-xs-4 col-xs-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">LOGIN</div>
						<div class="panel-body">
							<form action="login_submit.php" method="POST">		<!-- This form is used to login to the website. -->
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="email" class="form-control" name="email" placeholder="Email" required="true" 
									pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
									<!--div><!--?php if(isset($_GET['error'])) echo $_GET['error']; ?></div-->
								</div>
								<div class="form-group">
									<label for="password">Password:</label>
									<input type="password" class="form-control" name="password" placeholder="Password" required="true"
									pattern=".{6,}">
									<!--div><!--?php if(isset($_GET['error'])) echo $_GET['error'];?></div-->
								</div>
								<button class="btn btn-primary btn-block">Login</button><br><br><br>
							</form>
						</div>
						<div class="panel-footer">Don't have an account? <a href="signup.php">Click here to Sign Up</a></div>	<!-- This line is used if user is not registered. User is directed to the Signup page through this link. -->
					</div>
				</div>
		</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>