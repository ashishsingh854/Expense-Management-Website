<?php
	require 'includes/common.php';
	$expense_id = $_SESSION['id'];
	$title = $_POST['title'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$insert_query = "UPDATE new_plan SET title='$title', from_date='$from', to_date='$to' WHERE id='$expense_id'";
	$insert_query_result = mysqli_query($connection, $insert_query) or die(mysqli_error($connection));
	
	$select_query = "SELECT initial_budget,people FROM new_plan WHERE id='$expense_id'";
	$select_query_result = mysqli_query($connection, $select_query) or die(mysqli_error($connection));
	$array = mysqli_fetch_array($select_query_result);
	$budget = $array['0'];
	$nopeople = $array['1'];
	
	$count=1;
	while($count<=$nopeople){
		$person_name = $_POST['person'][$count];
		$insert_person = "INSERT INTO new_expense(person_name,expense_id) VALUES('$person_name', '$expense_id')";
		$insert_person_result = mysqli_query($connection, $insert_person) or die(mysqli_error($connection));
		$count++;
	}
	//header('location: home.php');
	echo "<script>alert('Your New Budget Planner Added Successfully.')</script>";
	echo "<script>location.href='home.php'</script>";
?>