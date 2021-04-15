<?php
	if(isset($_SESSION['email']))
		header('location: home.php');
	else
		require 'includes/common.php';
?>
<html>
	<head>
		<title>Expense Manager</title>			<!-- Title of the Page. -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/home.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
			include 'includes/header.php';				//Header of the page which is fixed.
		?>
		<div class=content>
			<div id="banner-image">
				<div class="container">
					<center><div id="banner-content">
						<h1>We help you control your budget</h1>
						<?php if(isset($_SESSION['email'])) { ?>
							<a href="home.php" class="btn btn-danger btn-lg active">Start Today</a>
						<?php } else { ?>
							<a href="login.php" class="btn btn-danger btn-lg active">Start Today</a>
						<?php } ?>
					</div></center>
				</div>
			</div>
			</div>
		</div>
		<?php
			include 'includes/footer.php';				//Footer of the page.
		?>
	</body>
</html>