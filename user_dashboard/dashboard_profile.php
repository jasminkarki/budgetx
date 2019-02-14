<?php
	$uid = $_SESSION['user'];
	$sql = "SELECT * FROM users WHERE id = $uid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>

<div class="card-body">
	<div class="row">
		<div class="container-fluid col-md-3">
			<img src="<?=$row['image_path']?>" alt="Profile Picture Here" class="img-responsive" style="width:250px;height:250px;">
		</div>
		<div class="container-fluid col-md-6">
			<ul class="list-group">
				<li class="list-group-item" style="background-color: #f2f2f2;"><h6><strong>Info</strong></h6></li>
				<li class="list-group-item"><b>Name: </b><?=$row['name']?></li>
				<li class="list-group-item"><b>Email: </b><?=$row['email']?></li>
			</ul>
		</div>
		<div class="container-fluid col-md-3">
			<ul class="list-group">
				<a href="?type=edit_profile">Edit Profile info</a>
			</ul>
		</div>
	</div>
</div>