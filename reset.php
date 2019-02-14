<?php include 'database\redirect_if_loggedin.php'; ?>
<?php include'database/maintainance_check.php'; ?>

<?php 
	$title = "New Password";
?>

<?php include 'partial_upper.php'; ?>
<?php include 'database/verify_password.php'; ?>
<div class="container col-sm-4">
	<div class="card">
		<div class="card-body">
			<form class="form" method="post" action="/database/change_password.php/?email=<?=$email?>&hash=<?=$hash?>">
				<div class="form-group">
					<label>Email</label>
					<input class="form-control-plaintext" type= "email" readonly name = "password1" value="<?=$email?>">
				</div>
				<div class="form-group">
					<label>Enter New Password</label>
					<input class="form-control" type= "password" name = "password1" required>
				</div>
				<div class="form-group">
					<label>Confirm New Password</label>
					<input class="form-control" type= "password" name = "password2" required>
				</div>
				<div class="form-group">
					<button class="btn btn-success" name="confirm">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include'partial_lower.php'; ?>