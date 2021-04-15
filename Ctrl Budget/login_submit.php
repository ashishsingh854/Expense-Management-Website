<?php
	if(isset($_SESSION['email']))
		header('location: home.php');
	else
		include 'includes/common.php';
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$regex_email = "/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	$email = mysqli_real_escape_string($connection, $email);
	$password = mysqli_real_escape_string($connection, $password);
	$password = md5($password);
	$select_id = "select id from user where email = '$email' AND password = '$password'";
	$select_id_result = mysqli_query($connection, $select_id) or die(mysqli_error($connection));
	if(mysqli_num_rows($select_id_result)==0){
		//header('location: login.php?error=Invalid Credentials');
		echo ("<script>alert('Enter valid email and password.')</script>");
		echo ("<script>location.href='login.php'</script>");
	}
	else {
		$data = mysqli_fetch_array($select_id_result);
		$_SESSION['email'] = $email;
		$_SESSION['user_id'] = $data['0'];
		header('location: home.php');
	}
?>