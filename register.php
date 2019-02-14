<?php include 'database/redirect_if_loggedin.php'; ?>
<?php include'database/maintainance_check.php'; ?>

<?php 
	$title = "Register";
?>

<?php include'partial_upper.php'; ?>

<div class="container col-md-4">
	<div class="card" style="margin:25px;">
	  	<h5 class="card-header text-center">Register</h5>
	  	<div class="card-body">
	  		<form class="form" action ="database\register.php" method="post" enctype="multipart/form-data">
	  			<div class="form-group label-floating">
	  				<label class="control-label" for="email_login">Name</label>
		  			<input class="form-control" type="text" name="name" required>
	  			</div>
	  			<div class="form-group label-floating">
	  				<label class="control-label" for="email_login">Email</label>
		  			<input class="form-control" type="text" name="email" required>
	  			</div>
		  		<div class="form-group label-floating">
		  			<label class="control-label" for="password1">Password</label>
		  			<input class="form-control" type="password" name="password1" required>
		  		</div>
		  		<div class="form-group label-floating">
		  			<label class="control-label" for="password2">Confirm Password</label>
		  			<input class="form-control" type="password" name="password2" required>
		  		</div>
				<div class="form-group">
		  			<img id="ProfImage" src="media/default.png" alt="your image" width="100" height="100" class="rounded-circle" />
		  			<span class="btn btn-danger"> Upload </span>
				  	<label class="control-label" for="image"> Select your image</label>
					<input type="file" name="image" onchange="document.getElementById('ProfImage').src = window.URL.createObjectURL(this.files[0])">
		  		</div>
		  		<div class="container">
					<button class="btn btn-success" name="submit">Register</button>
		  		</div>
			</form>
	  	</div>
	</div>
</div>

<?php include'partial_lower.php'; ?>