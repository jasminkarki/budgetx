<?php include 'database\redirect_if_loggedin.php'; ?>
<?php include'database/maintainance_check.php'; ?>

<?php 
	$title = "Login";
?>

<?php include'partial_upper.php';?>


<div class="container col-md-4" style="height: 95%;">
	<div class="card centered">
	  	<h6 class="card-header"><strong>Log in</strong></h6>
	  	<div class="card-body">
	  		<form class="form" action ="database\login.php" method="post">
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