<?php 
	$title = "Reset Password";
?>
<?php include'database/maintainance_check.php'; ?>
<?php include'partial_upper.php'; ?>
<div class="container">
	<div class="card">
		<div class="card-body">
			<form class="form" action="/database/password_reset.php" method="post">
			<div class="row">
				<div class="form-group col-md-4">
					<input class="form-control" type="text" name="email" placeholder="Email" required>
				</div>
				<div class="form-group col-md-8">
					<button class="btn btn-success" type="submit" name="forgot">Request Password</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
	

<?php include'partial_lower.php'; ?>