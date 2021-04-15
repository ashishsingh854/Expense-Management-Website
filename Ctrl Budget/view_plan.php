<?php
	if(isset($_SESSION['email']))
		header('location: login.php');
	else
		require 'includes/common.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>View Plan</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/home.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
			include 'includes/header.php';
			$eid = $_GET['eid'];
			$user_id = $_SESSION['user_id'];		//User id of the logged in user which is stored in the session until user gets logged out.
			//$expense_id = $_SESSION['id'];
			$expense_select = "SELECT * FROM new_expense WHERE expense_id='$eid'";			//Query for the expenses done by the user on different trips.
			$expense_select_result = mysqli_query($connection, $expense_select) or die(mysqli_error($connection));
			//$expense_array = mysqli_fetch_array($expense_select_result);
			$plan_select = "SELECT * FROM new_plan WHERE id='$eid'";
			$plan_select_result = mysqli_query($connection, $plan_select) or die(mysqli_error($connection));
			$plan_array = mysqli_fetch_array($plan_select_result);
		?>
		<div class="content top centered">
			<div class="container">
				<rows>
					<div class="col-md-6 col-sm-7">
						<div class="panel panel-primary">
							<div class="panel-heading text-center"><?php echo $plan_array['2']; ?><span class="glyphicon glyphicon-user right change"><font size="4px"><?php echo $plan_array['6']; ?></font></span></div>
							<div class="panel-body">
							<?php 
							
							$count=1;
							$expense_sum=0;
							while($count<=$plan_array['6']) {
								$remaining_array = mysqli_fetch_array($expense_select_result);
								if($remaining_array['5']!=NULL)
									$expense_sum += $remaining_array['5'];
								$count++;
							} ?>
								<div><b>Budget</b><div class='right'><?php echo $plan_array['5']; ?></div></div><br/>
								<div><b>Remaining Amount</b><div class='right'><?php $total = $plan_array['5'] - $expense_sum;   
								if($total>0)
									echo '<font color=green><b>&#8377; '.$total.'</b></font>';
								else if($total<0)
									echo '<font color=red><b>Overspent by &#8377; '.-$total.'</b></font>';
								else
									echo '<b>&#8377; '.$total.'</b>';
							?></div></div><br/>
								<div><b>Date</b><div class='right'>
									<?php $fromdate = new DATETIME($plan_array['3']);
										  $todate = new DATETIME($plan_array['4']);
										  echo (date_format($fromdate,"jS M - ").date_format($todate,'jS M Y'));
									?>
									</div>
								</div><br/>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 expense">
						<a class="btn btn-outline-primary" href="expense_distribution.php?eid=<?php echo $eid; ?>">Expense Distribution</a>
					</div>
				</rows>
				<!--rows>
					<div class="col-md-5 col-sm-6 col-xs-12 col-md-offset-1 right">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">Add New Expense</div>		<!-- Form to add new expense. -->
							<!--div class="panel-body">
								<form action="new_expense.php?eid=<!?php echo $eid; ?>" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="title">Title:</label>
										<input type="text" class="form-control" name="title" placeholder="Expense Name" required>
									</div>
									<div class="form-group">
										<label for="date">Date:</label>
										<input type="date" class="form-control" name="date" min="<!?php echo $plan_array['3']; ?>" max="<!?php echo $plan_array['4']; ?>" placeholder="dd/mm/yyyy" required>
									</div>
									<div class="form-group">
										<label for="amount">Amount Spent</label>
										<input type="text" class="form-control" name="amount" placeholder="Amount Spent" required>
									</div>
									<div class="form-group">
										<select name="person" class="form-control" required>
											<option value="none" selected disabled hidden required="false">Choose</option>
											<!?php
											$name_select = "SELECT * FROM new_expense WHERE expense_id='$eid'";
											$name_select_result = mysqli_query($connection, $expense_select) or die(mysqli_error($connection));
												$count=1;
												while($count<=$plan_array['6']) {
													$name_array = mysqli_fetch_array($name_select_result);
											?>
												<option value="<!?php echo $name_array['1']; ?>"><!?php echo $name_array['1']; ?></option>
												<!?php $count++; } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="uploadedimage">Upload Bill</label>
										<input type="file" class="form-control" name="uploadedimage">
									</div>
									<button class="btn btn-primary btn-block" name="add">Add</button>
								</form>
							</div>
						</div>
					</div>
				</rows-->
				<rows>
				<div class="col-md-6">
				<?php 
				$count=1;
				$details = "SELECT * FROM new_expense WHERE expense_id='$eid'";
				$details_result = mysqli_query($connection, $details) or die(mysqli_error($connection));
				while($count<=$plan_array['6']) {
					
					$details_array = mysqli_fetch_array($details_result);
					if($details_array['4']!=NULL) {
				?>
					
					<div class="col-md-6 col-sm-4 col-xs-6">
						<div class="panel panel-primary">
							<div class="panel-heading text-center"><?php echo $details_array['3']; ?></div>
							<div class="panel-body">
								<div><b>Amount</b><div class="right"><?php echo $details_array['5']; ?></div></div><br/>
								<div><b>Paid by</b><div class="right"><?php echo $details_array['1']; ?></div></div><br/>
								<div><b>Paid on</b><div class="right"><?php $date = new DATETIME($details_array['4']);  echo date_format($date,"jS M-Y"); ?></div></div><br/>
								<?php if($details_array['6']==NULL) { ?>
									<center><a href="">You Don't have bill</a></center>
								<?php } else { ?>
									<center><a href="upload.php?load=<?php echo $details_array['0']; ?>">Show bill</a></center>
								<?php } ?>
							</div>
						</div>
					</div>
				
				<?php } $count++; } ?>
				</div>
				</rows>
				<rows>
					<div class="col-md-5 col-sm-8 col-xs-12 col-md-offset-1 right">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">Add New Expense</div>		<!-- Form to add new expense. -->
							<div class="panel-body">
								<form action="new_expense.php?eid=<?php echo $eid; ?>" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="title">Title:</label>
										<input type="text" class="form-control" name="title" placeholder="Expense Name" required>
									</div>
									<div class="form-group">
										<label for="date">Date:</label>
										<input type="date" class="form-control" name="date" min="<?php echo $plan_array['3']; ?>" max="<?php echo $plan_array['4']; ?>" placeholder="dd/mm/yyyy" required>
									</div>
									<div class="form-group">
										<label for="amount">Amount Spent</label>
										<input type="text" class="form-control" name="amount" placeholder="Amount Spent" required>
									</div>
									<div class="form-group">
										<select name="person" class="form-control" required>
											<option value="none" selected disabled hidden required="false">Choose</option>
											<?php
											$name_select = "SELECT * FROM new_expense WHERE expense_id='$eid'";
											$name_select_result = mysqli_query($connection, $expense_select) or die(mysqli_error($connection));
												$count=1;
												while($count<=$plan_array['6']) {
													$name_array = mysqli_fetch_array($name_select_result);
											?>
												<option value="<?php echo $name_array['1']; ?>"><?php echo $name_array['1']; ?></option>
												<?php $count++; } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="uploadedimage">Upload Bill</label>
										<input type="file" class="form-control" name="uploadedimage">
									</div>
									<button class="btn btn-outline-primary btn-block" name="add">Add</button>
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