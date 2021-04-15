<?php
	if(isset($_SESSION['email']))
		header('location: login.php');
	else
		require 'includes/common.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Settings</title>
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
			<div class="row row-style">
				<div class="col-xs-4 col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><h4>Change Password</h4></div>
					<div class="panel-body">
						<form action='change_password_script.php' method='POST'>
							<div class="form-group">
								<label for="old">Old Password:</label>
								<input type="password" class="form-control" name="old" placeholder="Old Password" pattern=".{6,}">
							</div>
							<div class="form-group">
								<label for="new">New Password:</label>
								<input type="password" class="form-control" name="new" placeholder="New Password(Min. 6 characters)" pattern=".{6,}">
							</div>
							<div class="form-group">
								<label for="renew">Confirm New Password:</label>
								<input type="password" class="form-control" name="renew" placeholder="Re-type New Password" pattern=".{6,}">
							</div>
							<button class="btn btn-primary btn-block">Change</button>
							<div><?php if(isset($_GET['success'])) echo $_GET['success']; ?></div>
						</form>
					</div>
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