<?php
	if(isset($_SESSION['email']))
		header('location: home.php');
	else
		include 'includes/common.php';
	
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$contact = $_POST['phone'];
	
	$select_id = "select id from user where email = '$email'";
	$select_id_result = mysqli_query($connection, $select_id) or die(mysqli_error($connection));
	if(strlen($password)<6){
		echo "<script>alert('Minimum 6 digits required.')</script>";
		echo ("<script>location.href='signup.php'</script>");
	}
	else if(mysqli_num_rows($select_id_result)>0){
		//$fail = "<span class='red'>Email Already Registered</span>";
		//header('location: signup.php?error='.$fail);
		echo "<script>alert('Email Already Registered')</script>";
		echo ("<script>location.href='signup.php'</script>");
	}
	else{
		$password = md5($password);
		$signup_query = "insert into user(name,email,password,contact) values('$name','$email','$password','$contact')";
		$signup_submit = mysqli_query($connection, $signup_query) or die(mysqli_error($connection)."<script>alert('Not a valid phone number.')</script><script>location.href='signup.php'</script>");
		$_SESSION['email'] = $email;
		$_SESSION['user_id'] = mysqli_insert_id($connection);
		//header('location: home.php');
		echo "<script>alert('User Successfully Registered.')</script>";
		echo "<script>location.href='home.php'</script>";
	}
?>