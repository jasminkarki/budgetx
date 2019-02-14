<?php 
	require_once('connection.php');
	session_start();
	if(isset($_POST['toggle_maintainance']) && $_POST['toggle_maintainance']!=null){
		$tgl_value = $_POST['toggle_maintainance'];
		$sql = "UPDATE admin_settings SET maintainance=$tgl_value WHERE id = 1";
		$result = mysqli_query($conn,$sql);
		$_SESSION['message'] = "Settings saved";
		header('location:/dashboard_admin.php/?type=settings');
	}else{
		$_SESSION['message'] = "Settings saved";
		header('location:/dashboard_admin.php/?type=settings');
	}

?>