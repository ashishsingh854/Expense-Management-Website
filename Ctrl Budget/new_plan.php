<?php
	if(isset($_SESSION['email']))
		header('location: login.php');
	else
		require 'includes/common.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>New Plan</title>
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
				<rows>
					<div class="col-md-5 col-sm-6 col-xs-offset-3">
						<div class="panel panel-primary">			<!-- This page is used to add new plan. -->
							<div class="panel-heading text-center">Create New Plan</div>
							<div class="panel-body">
								<form action="new_plan_valid.php" method="POST">
									<div class="form-group">
										<label for="initial_budget">Initial Budget:</label>
										<input type="number" class="form-control" name="initial_budget" placeholder="Initial Budget(Ex: 4000)" required="true" min="50">
									</div>
									<div class="form-group">
										<label for="peoples">How many peoples you want to add in your group?</label>
										<input type="number" class="form-control" name="peoples" placeholder="No. of people" required="true" min="1">
									</div>
									<button class="btn btn-outline-primary btn-block">Next</button><br/>
								</form>
							</div>
						</div>
					</div>
				</rows>
			</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>