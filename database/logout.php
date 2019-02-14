<?php
	session_start();
	require_once('connection.php');

	if(session_destroy()){
		header('location:/login.php');
	}
	else{
		echo"Unable to log out";
	}
?>