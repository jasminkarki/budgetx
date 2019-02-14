<?php
	$title = "Login as Administrator";
?>
<?php include 'database\redirect_if_loggedin.php'; ?>
<?php include 'partial_upper.php';?>
<div class="container col-md-4 md-offset-4">
	<div class="card">
	  	<h5 class="card-header">Log in</h5>
	  	<div class="card-body">
	  		<form class="form" action ="database\admin_login.php" method="post">
	  			<div class="form-group label-floating">
	  				<label class="control-label" for="email_login">Email</label>
		  			<input class="form-control" type="text" name="email_login" required>
	  			</div>
		  		<div class="form-group label-floating">
		  			<label class="control-label" for="password_login">Password</label>
		  			<input class="form-control" type="password" name="password_login" required>
		  		</div>
		  		<div class="form-group">
					<button class="btn btn-success" name="submit">Login</button>
		  		</div>
		  		<div class="form-group">
		  			<a href="password_reset.php">Forgot your password?</a>
		  		</div>
			</form>
	  	</div>
	</div>
</div>

<?php include'partial_lower.php'; ?>