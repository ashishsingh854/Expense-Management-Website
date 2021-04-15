<?php
	require 'includes/common.php';
	$budget = mysqli_real_escape_string($connection, $_POST['initial_budget']);
	$people	= mysqli_real_escape_string($connection, $_POST['peoples']);
	$user_id = $_SESSION['user_id'];
	$insert_details = "INSERT INTO new_plan(user_id,initial_budget, people) VALUES('$user_id', '$budget', '$people')";
	//$insert_details = "INSERT INTO `new_plan` (`id`,`user_id`, `title`, `from`, `to`, `initial_budget`, `people`) VALUES (NULL, '$user_id', NULL, NULL, NULL, '$budget', '$people')";
	$insert_details_result = mysqli_query($connection, $insert_details) or die(mysqli_error($connection));
	$array = mysqli_fetch_array($insert_details_result);
	$_SESSION['id'] = mysqli_insert_id($connection);
	header('location: plan_details.php');
?>