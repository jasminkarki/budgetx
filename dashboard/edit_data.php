<?php
	session_start();
	require_once 'connection.php';
	
	//FOR EDITING DATA!!

	if(isset($_POST['edit_OK'])){
		$id = $_POST['id'];
		$finance_type_id = $_POST['finance_type_id'];

		$amount_new = mysqli_real_escape_string($conn,$_POST['amount_new']);
		$cat_new = mysqli_real_escape_string($conn,$_POST['cat_new']);
		$date_new = stripslashes($_POST['date_new']);
		$date_new = mysqli_real_escape_string($conn,$date_new);

		$cat_id=0;

		$sql = "SELECT * FROM categories";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
			if($row['category'] == $cat_new){
				$cat_id=$row['id'];
			}
		}

		$sql = "UPDATE finances SET amount='$amount_new', transaction_date='$date_new', category_id='$cat_id' WHERE id='$id'";
		$result=mysqli_query($conn,$sql);
		if(!$result){
			echo msqli_error($conn);
		}
		else{
			if($finance_type_id==1){
				header('location:/overview.php?type=income');
			}
			else{
				header('location:/overview.php?type=expense');
			}
		}
	}

	//FOR DELETING DATA
	else if(isset($_POST['delete_OK'])){
		$id = $_POST['id'];
		echo $id;
		$sql = "DELETE FROM finances WHERE id='$id'";
		$result=mysqli_query($conn,$sql);
		if(!$result){
			echo "ASDFA".msqli_error($conn);
		}
		else{
			header('location:/overview.php');
		}
	}
	
?>
