<?php 
	require_once('connection.php');
	session_start();
	$uid = $_SESSION['user'];
	if(isset($_POST['toggle_quote_pref'])){
		$tgl_value = $_POST['toggle_quote_pref'];
		$sql = "UPDATE users SET quote_pref=$tgl_value WHERE id = $uid";
		$result = mysqli_query($conn,$sql);
		$_SESSION['message'] = "Settings saved";
		header('location:/overview.php?type=settings');
	}else{
		//$_SESSION['message'] = "Settings saved";
		header('location:/overview.php/?type=settings');
	}

?>