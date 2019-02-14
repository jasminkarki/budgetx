<?php include 'database\redirect_if_loggedin.php'; ?>
<?php include'database/maintainance_check.php'; ?>


<?php 
	$title = "Verification";
?>

<?php include'partial_upper.php'; ?>
<?php include'database\verify.php'; ?>

<div class="container">
	<div class="card">
		<div class="card-body">
			<?php echo $_SESSION['message'] ?>
		</div>
	</div>
</div>

<?php include'partial_lower.php'; ?>