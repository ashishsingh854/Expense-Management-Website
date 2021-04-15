<?php
	if(isset($_SESSION['email']))
		header('location: login.php');
	else
		require 'includes/common.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/home.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
			include 'includes/header.php';
			$expense_id = $_SESSION['id'];
			$select_query = "SELECT initial_budget,people FROM new_plan WHERE id='$expense_id'";
			$select_query_result = mysqli_query($connection, $select_query) or die(mysqli_error($connection));
			$array = mysqli_fetch_array($select_query_result);
			$budget = $array['0'];
			$nopeople = $array['1'];
			
		?>
		<div class="content top centered">
			<div class="container">
				<rows>
					<div class="col-md-5 col-sm-6 col-xs-offset-3">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">Add Plan Details</div>
							<div class="panel-body">
								<form action="plan_details_valid.php" method="POST">
									<div class="form-group col-md-14">
										<label for="title">Title:</label>
										<input type="text" class="form-control" name="title" placeholder="Enter Title(Ex: Trip to Goa)" required="true">
									</div>
									<div class="form-group col-md-6">
										<label for="from">From:</label>
										<input type="date" class="form-control" name="from" placeholder="dd/mm/yyyy" required="true" min="2019-04-01" max="2019-04-20">
									</div>
									<div class="form-group col-md-6">
										<label for="to">To:</label>
										<input type="date" class="form-control" name="to" placeholder="dd/mm/yyyy" required="true" min="2019-04-01" max="2019-04-20">
									</div>
									<div class="form-group col-md-8">
										<label for="budget">Initial Budget:</label>
										<input type="number" class="form-control" name="budget" disabled value="<?php echo $budget; ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="people">No. of people:</label>
										<input type="number" class="form-control" name="people" disabled value="<?php echo $nopeople; ?>">
									</div>
									<?php
										$count=1;
										while($count<=$nopeople) {
											echo '<div class="form-group col-md-14">';
												echo "<label for='person[$count]'>Person $count;:</label>";
												echo "<input type='text' class='form-control' name='person[$count]' placeholder='Person $count Name'>";
											echo '</div>';
											$count++;
										} ?>
									<button class="btn btn-outline-primary btn-block">Submit</button>
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