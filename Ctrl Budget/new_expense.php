<?php
	require 'includes/common.php';
	$eid = $_GET['eid'];
	//$expense = $_SESSION['expense'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$paid_by = $_POST['person'];
	//$uploadedimage = $_POST['uploadedimage'];
	
	function GetImageExtension ($imagetype){
		if(empty ($imagetype)) return false ;
		switch ($imagetype){
			case 'image/bmp' : return '.bmp' ;
			case 'image/gif' : return '.gif' ;
			case 'image/jpeg' : return '.jpg' ;
			case 'image/png' : return '.png' ;
			default : return false ;
		}
	}
	if(!empty($_FILES["uploadedimage"]["name"])) {
		$file_name=$_FILES["uploadedimage"]["name"];
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
		$imgtype=$_FILES["uploadedimage"]["type"];
		$ext= GetImageExtension($imgtype);
		$imagename=date( "d-m-Y" )."-".time().$ext;
		$target_path = "img/".$imagename;
		//echo $imagename;
		if (move_uploaded_file($temp_name, $target_path)){
			// Make a query to save data to your database.
			$upload_image = "UPDATE new_expense SET Upload_bill='$imagename' WHERE person_name='$paid_by' and expense_id='$eid'";
			$upload_image_result = mysqli_query($connection, $upload_image) or die(mysqli_error($connection));
		}
	}
		
	if($amount<0) {
		echo "<script>alert('Amount cannot be Negative.')</script>";
		//echo ("<script>location.href='view_plan.php?eid='.$eid</script>");
	}
	else {
		$update_expense = "UPDATE new_expense SET title='$title', date='$date', amount_spent='$amount' WHERE person_name='$paid_by' and expense_id='$eid'";
		$update_expense_result = mysqli_query($connection, $update_expense) or die(mysqli_error($connection));
	}
	echo ("<script>location.href='view_plan.php?eid=$eid'</script>");
	//header('location: view_plan.php?eid='.$eid);
?>