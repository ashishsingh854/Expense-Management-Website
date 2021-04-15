<?php
	require 'includes/common.php';			//Connect to the database through this file and start the session.
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>About Us</title>
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
					<div class="col-md-6 col-sm-6">
						<h2>Who are we?</h2>			<!-- This page contains details of the company. -->
						<p>We are a group of young technocrats who came up with an idea of solving budget and time issues which we usually face in
						our daily lives. We are here to provide a budget controller according to your aspects.</p>
						<p>Budget control is the biggest financial issue in the present world. One should look after thier budget control to get ride 
						off from thier financial crisis.</p>
						<h2>Contact Us</h2>
						<p><b>Email:</b> trainings@internshala.com</p>
						<p><b>Mobile:</b> +91-8448444853
					</div>
					<div class="col-md-6 col-sm-6">
						<h2>Why choose us?</h2>
						<p>We provide with a predominant way to control and manage your budget estimations with ease of accessing for multiple users.</p>
					</div>
				</rows>
			</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>