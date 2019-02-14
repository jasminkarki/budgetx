<?php
	$sql = "select * from notices where id =".$_GET['notice'];
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
<a href="/dashboard_admin.php/?type=notices">
	<button class="btn btn-success">
		<span class="material-icons">keyboard_arrow_left</span>
		Back to Notices
	</button>
</a>
<h6 class="card-header"><?=$row['title']?></h6>
<p class="card-text">
	<?=$row['body']?>
</p>