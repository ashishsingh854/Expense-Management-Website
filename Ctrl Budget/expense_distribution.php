<?php
	if(isset($_SESSION['email']))
		header('location: login.php');
	else
		require 'includes/common.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Expense Distribution</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/home.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<?php
			include 'includes/header.php';
			$expense = $_GET['eid'];
			$user_id = $_SESSION['user_id'];
			//$expense_id = $_SESSION['id'];
			$expense_select = "SELECT * FROM new_expense WHERE expense_id='$expense'";
			$expense_select_result = mysqli_query($connection, $expense_select) or die(mysqli_error($connection));
			//$expense_array = mysqli_fetch_array($expense_select_result);
			$plan_select = "SELECT * FROM new_plan WHERE id='$expense'";
			$plan_select_result = mysqli_query($connection, $plan_select) or die(mysqli_error($connection));
			$plan_array = mysqli_fetch_array($plan_select_result);
		?>
		<div class="content top">
		<div class="container">
			<div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading text-center"><?php echo $plan_array['2']; ?><span class="glyphicon glyphicon-user right change"><font size="4px"><?php echo $plan_array['6']; ?></font></span></div>
					<div class="panel-body">
						<div><b>Initial Budget<div class="right">&#8377; <?php echo $plan_array['5']; ?></div></b></div><br/>
					<?php
						$sum=0;
						$count=1;
						while($count<=$plan_array['6']) {
							$expense_array = mysqli_fetch_array($expense_select_result);
							$sum += $expense_array['5'];
							if($expense_array['5']==NULL) {
					?>
						<div><b><?php echo $expense_array['1']; ?></b><div class="right">&#8377; 0</div></div><br/>
							<?php } else { ?>
							<div><b><?php echo $expense_array['1']; ?></b><div class="right">&#8377; <?php echo $expense_array['5']; ?></div></div><br/>
							<?php } $count++;  } ?>
						<div><b>Total Amount Spent<div class="right">&#8377; <?php echo $sum; ?></div></b></div><br/>
						<div><b>Remaining Amount</b><div class="right">
						<?php $remaining = $plan_array['5'] - $sum;  
						if($remaining>0)
							echo '<font color=green><b>&#8377; '.$remaining.'</b></font>';
						else if($remaining<0)
							echo '<font color=red><b>Overspent by &#8377; '.-$remaining.'</b></font>';
						else
							echo '<b>&#8377; '.$remaining.'</b>'; ?>
						</div>
						</div><br/>
						<div><b>Individual Shares</b><div class="right">&#8377; <?php $individual = bcdiv($sum/$plan_array['6'],1,2);   echo $individual; ?></div></div><br/>
					<?php
						$share_select = "SELECT * FROM new_expense WHERE expense_id='$expense'";
						$share_select_result = mysqli_query($connection, $share_select) or die(mysqli_error($connection));
						$count=1;
						while($count<=$plan_array['6']) {
							$share_array = mysqli_fetch_array($share_select_result);
					?>
						<div><b><?php echo $share_array['1']; ?></b><div class="right">
						<?php $have = $share_array['5']-$individual;  
						if($have>0)
							echo '<font color=green>Gets back &#8377;'.$have.'</font>'; 
						else if($have<0){
							$having = abs($have);
							echo '<font color=red>Owes &#8377;'.$having.'</font>';							
						}
						else
							echo 'All Settled up'; ?>
						</div>
						</div><br/>
					<?php $count++;  } ?>
						<center><a href="view_plan.php?eid=<?php echo $expense; ?>" class="btn btn-outline-primary"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a></center>
					</div>
				</div>
			</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>