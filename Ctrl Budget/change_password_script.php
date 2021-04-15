<?php
	if(isset($_SESSION['email']))
		header('location: home.php');
	else
		require 'includes/common.php';
	
	$old_password = $_POST['old'];
	$old_password = mysqli_real_escape_string($connection, $old_password);
	$old_password = md5($old_password);
	
	$new_password = $_POST['new'];
	$new_password = mysqli_real_escape_string($connection, $new_password);
	$new_password = md5($new_password);
	
	$new_passwordRe = $_POST['renew'];
	$new_passwordRe = mysqli_real_escape_string($connection, $new_passwordRe);
	$new_passwordRe = md5($new_passwordRe);
	
	$email = $_SESSION['email'];
	$password_query = "SELECT * FROM user WHERE email='$email' AND password='$old_password'";
	$password_query_result = mysqli_query($connection, $password_query) or die(mysqli_error($connection));
	$rows = mysqli_num_rows($password_query_result);
	
	if($rows>0 && $new_password==$new_passwordRe) {
		$update = "UPDATE user SET password='$new_password' WHERE email='$email'";
		$update_result = mysqli_query($connection, $update) or die(mysqli_error($connection));
		//header('location: change_password.php?success=Password Changed');
		echo "<script>alert('Password Changed Successfully.')</script>";
		echo ("<script>location.href='index.php'</script>");
	}
	else if($rows>0 && $new_password!=$new_passwordRe) {
		//header('location: change_password.php?success=Invalid Credentials');
		echo "<script>alert('Password don\'t match.')</script>";
		echo ("<script>location.href='change_password.php'</script>");
	}
	else if($rows==0) {
		echo "<script>alert('Wrong old password.')</script>";
		echo ("<script>location.href='change_password.php'</script>");
	}
	else if(strlen($new_password)<=6) {
		echo "<script>alert('Minimum 6 digits required.')</script>";
		echo ("<script>location.href='change_password.php'</script>");
	}
?>