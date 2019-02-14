<?php 
	$title = "Index";
?>

<?php include'partial_upper.php'; ?>
<?php
		$query = "SELECT category FROM categories";
		$result = mysqli_query($conn, $query);


?>
<div class="container col-md-6">
	<div class="card">
	  	<h5 class="card-header">Add Transaction</h5>
	  	<div class="card-body">
	  		<form class="form" action ="database\transaction.php" method="post">
	  			<div class="form-group">
		  			<input type="radio" name="ftype" value="income" checked>Income 
					<input type="radio" name="ftype" value="expense">Expense
	  			</div>
		  		<div class="form-group">
		  			<label>Transaction Date</label>
		  			<input class="form-control" type = "date" name="tdate"><br>
		  		</div>
		  		<div class="form-group">
		  			<label >Amount</label>
		  			<input class="form-control" type="unsigned float" name="amount" placeholder="Rs."><br>
		  		</div>
		  		<div class="form-group">
		  			<label>Category</label>
		  			<select input type ="text" name = "category" value="<?php echo $_SESSION['category'] ?>" >
						<?php while($row = mysqli_fetch_assoc($result)){
							echo "<option>".$row['category']."</option>";
							}
						?>
					</select>
		  		</div>
		  		<div class="form-group">
					<button class="btn btn-primary" name="submit">Add</button>
		  		</div>
			</form>
	  	</div>
	</div>
</div>
<?php include'partial_lower.php'; ?>