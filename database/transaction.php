<?php
	session_start();
	require_once('connection.php');
	if(isset($_POST['submit'])){
		$ftype = $_POST['ftype'];
		$tdate = $_POST['tdate'];
		$amount = $_POST['amount'];
		$frequency = $_POST['frequency'];
		$description = $_POST['description'];
		$ftype = stripslashes($ftype);
		$tdate = stripslashes($tdate);
		$amount = stripslashes($amount);
		$frequency = stripslashes($frequency);
		$ftype = mysqli_real_escape_string($conn,$ftype);
		$tdate = mysqli_real_escape_string($conn,$tdate);
		$amount = mysqli_real_escape_string($conn,$amount);
		$frequency = mysqli_real_escape_string($conn,$frequency);

		if ($_POST['ftype']=="income")
			$f_id = 1;
		else 
			$f_id = 2;
		
		$category = $_POST['category'];
		$category = stripslashes($category);
		$category = mysqli_real_escape_string($conn,$category);
		$cid = "SELECT id FROM categories WHERE category = '$category'";
		$cid = mysqli_query($conn, $cid);
		$cid = mysqli_fetch_assoc($cid);
		$uid = $_SESSION['user'];
		$sql = "INSERT INTO finances (user_id, finance_type_id, amount, transaction_date, category_id, frequency, description,last_transaction_date)
				VALUES ('$uid', '$f_id', '$amount', '$tdate', '".$cid['id']."', '$frequency', '$description','$tdate')";
		$result = mysqli_query($conn, $sql);
		header('location:/overview.php');
	}else{
		echo "nah man";
	}
?>