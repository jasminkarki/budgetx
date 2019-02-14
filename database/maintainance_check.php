<?php
	require_once 'connection.php';
	$sql = "SElECT * from admin_settings";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
		header('location:/dashboard_admin.php');
	}else{
		if($row['maintainance'] == 1){
		header('location:/maintainance_notice.php');
	}
	}
	
?>