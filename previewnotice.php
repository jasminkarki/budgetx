<?php 
	$title = "Index";
?>
<?php include'database/maintainance_check.php'; ?>

<?php include'partial_upper.php'; ?>
<div class="col-md-8 container">
	<div class="card">
		<div class="card-body">
		<?php
			$no = $_GET['count'];
			$sql = "SELECT * FROM notices WHERE id=$no";
			$result = mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
		?>
			<h1><?= $row['title']; ?></h1>
			<p><?=$row['body'];?></p>
		
			<a href="notice.php">
				<button class="btn btn-success">
					Back
				</button>
			</a>
		</div>
	</div>
</div>
<?php
	$check = "read".$_GET['count'];
	$check_value =1;
	setcookie($check,$check_value);
?>
<?php include'partial_lower.php'; ?>
