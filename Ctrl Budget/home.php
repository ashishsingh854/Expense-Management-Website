<?php
	if(isset($_SESSION['email'])) {
		header('location: index.php');
	}
	else {
		require 'includes/common.php';
	}
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
			$user_id = $_SESSION['user_id'];
			//$expense_id = $_SESSION['id'];
			$plan_select = "SELECT * FROM new_plan WHERE user_id='$user_id'";					//Extract the details from database.
			$plan_select_result = mysqli_query($connection, $plan_select) or die(mysqli_error($connection));    //Execution of the query.
			$num = mysqli_num_rows($plan_select_result);		//Number of rows extracted from the database through query.
		?>
		<div class="content top centered">
			<div class="container">
			<?php if($num==0) { ?>				<!-- If there is no plans exists or for a new user. -->
				<h2>You don't have any active plans</h2><br/>
				<div class="col-md-3 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-body text-center">
						<br/><br/><br/><a href="new_plan.php" class="glyphicon glyphicon-plus-sign"> Create a New Plan</a><br/><br/><br/><br/>
					</div>
				</div>
				</div>
			<?php } else { ?>			<!-- If there are plans in the database then plans will be displayed. -->
			<rows>
				<h2> Your Plans</h2><br/>
				<?php 
					$i=0;
					while($i<$num) {			//Loop is used to extract all the plans of the user from the database and display on the page.
						$array = mysqli_fetch_array($plan_select_result);		//Fetch the details of every plan and automatically incremented and fetch next plan.
						$expense = $array['0'];									//Id of the plan.
				?>
					<div class="col-md-3 col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading text-center"><?php echo $array['2']; ?><span class="glyphicon glyphicon-user right change"><font size="4px"><?php echo $array['6']; ?></font></span></div>
							<div class="panel-body">
								<div><b>Budget</b><div class="right"><?php echo $array['5']; ?></div></div><br/>
								<div><b>Date</b><div class="right"><?php $fromdate = new DATETIME($array['3']);
																		 $todate = new DATETIME($array['4']);
																		 echo (date_format($fromdate,"jS M - ").date_format($todate,'jS M Y'));
																	?>
												</div>
								</div><br/>
								<a class="btn btn-outline-primary btn-block" href="view_plan.php?eid=<?php echo $expense; ?>">View Plan</a>
							</div>
						</div>
					</div>
					<?php $i++; } ?>
			</rows>
			<a href="new_plan.php" class="fixedbutton"><span class="glyphicon glyphicon-plus-sign"></span></a>	<!-- This button is used to create new plan. -->
			<?php } ?>
			</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>