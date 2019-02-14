<?php
	$uid = $_SESSION['user'];
	$sql = "SELECT * FROM users WHERE id = $uid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>

<div class="card-body">
	<form class="form col-md-4" method="post" action="\database\edit_profile.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input class="form-control" name="name" value = "<?=$row['name']?>" required>
		</div>
		<div class="form-group">
  			<img id="blah" src="<?=$row['image_path']?>" alt="your image" width="100" height="100" class="rounded-circle" />
  			<span class="btn btn-danger"> Upload </span>
		  	<label class="control-label" for="image"> Select your image</label>
			<input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

  		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success" name="submit">Update</button>
		</div>
	</form>

	<form class="form col-md-4" method="post" action="\database\change_password.php">
		<div class ="form-group">
			<label for="change_password" class="control-label">Old Password</label>
			<input class="form-control" name="password_old" type="password">
			<label for="change_password" class="control-label">New Password</label>
			<input class="form-control" name="password_new1" type="password">
			<label for="change_password" class="control-label">Re-enter New Password</label>
			<input class="form-control" name="password_new2" type="password">

		</div>
		<div class ="form-group">
			<button type="submit" class="btn btn-success" name="confirm">Confirm</button>
		</div>

	</form>

	
</div>