<?php
	require_once 'connection.php';
	session_start();

	$target= '/media/';
	$default_file = $target."default.png";
	if(isset($_FILES["image"]) && $_FILES["image"]!=null){
		$target_file=$target.basename($_FILES["image"]["name"]);
		$filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		$checkfiletype = array('png','jpg','jpeg');
	}
	if(isset($_POST['submit'])){
		if(isset($target_file)){
			if(move_uploaded_file($_FILES["image"]["tmp_name"], '..'.$target_file)){
				$image_path = $target_file;
				echo $image_path;
			}
			echo $image_path;
		}
		else{
			$image_path = $default_file;
		}
		if(isset($_POST['email']) && $_POST['name']){
			$email = $_POST['email'];
			$name = $_POST['name'];
			$uid = $_SESSION['user'];
			echo $email;
			echo $image_path;
			$sql = "UPDATE users SET name='$name', image_path='$image_path' WHERE id = $uid";
			$result = mysqli_query($conn,$sql);
			header('location:/overview.php/?type=profile');
		}
	}

?>