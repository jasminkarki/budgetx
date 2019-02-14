<?php include 'database\redirect_if_loggedin.php'; ?>
<?php include'database/maintainance_check.php'; ?>

<?php 
	$title = "Waiting";
?>

<?php include'partial_upper.php'; ?>
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>Welcome</h3>
			<small>You are now one step away.</small>
		</div>
		<div class="card-body">
			Please verify your account through mail.		
		</div>
	</div>
</div>

<?php include'partial_lower.php'; ?>