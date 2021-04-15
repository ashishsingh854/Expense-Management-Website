<?php
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
			$load_id = $_GET['load'];
			$show_image = "Select expense_id,Upload_bill from new_expense where id='$load_id'";
			$show_image_result = mysqli_query($connection,$show_image) or die(mysqli_error($connection));
			$array = mysqli_fetch_array($show_image_result);
		?>
		<div class="content container top">
			<center><div>
			<?php
				echo '<img src="img/'.$array['Upload_bill'].'" width="500" height="300"/>';
			?>
			</div>
			<div>
			<br><a href="view_plan.php?eid=<?php echo $array['expense_id']; ?>" class="btn btn-outline-primary">Close</a>
			</div>
		</div></center>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>