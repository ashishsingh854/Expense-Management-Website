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
		<title>Sign Up</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/home.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
			include 'includes/header.php';
		?>
		<div class="content top">
		<div class="container">
				<div class="col-xs-4 col-xs-offset-4">		<!-- This line is used to make the website responsive in different screen sizes. -->
					<div class="panel panel-default">
						<div class="panel-heading">SIGN UP</div>
						<div class="panel-body">
							<form method="POST" action="signup_script.php">       <!-- Signup Form to register the user. -->
								<label for="name">Name:</label>
								<input type="text" class="form-group form-control" name="name" placeholder="Name" required="true">
								<label for="email">Email:</label>
								<input type="email" class="form-group form-control" name="email" placeholder="Enter Valid Email" required="true" 
								pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
								<label for="password">Password:</label>
								<input type="password" class="form-group form-control" name="password" placeholder="Password(Min. 6 Characters)" required="true">
								<label for="phone">Phone Number:</label>
								<input type="text" class="form-group form-control" name="phone" placeholder="Enter Valid Phone Number(Ex: 8848444853)" required="true">
								<!--div><!--?php if(isset($_GET['error'])) echo $_GET['error']; ?></div-->
								<button class="btn btn-primary btn-block">Submit</button>
							</form>
						</div>
					</div>
				</div>
		</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>