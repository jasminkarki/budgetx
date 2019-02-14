<?php 
	$title = "Savings";
?>

<?php include'partial_upper.php'; ?>

<div class="container">
	<div class="card">
		<h5 class="card-header">Savings</h5>
		<div class="card-body">
		<?php
			$total_income = 0;
			$total_expense = 0;

			$sql1="SELECT amount,finance_type_id FROM finances";
			$result1=mysqli_query($conn,$sql1);

			if(mysqli_num_rows($result1)>0){
				while($row=mysqli_fetch_assoc($result1)){
					if($row['finance_type_id'] == 1){
						$total_income += $row['amount'];
					}else{
						$total_expense += $row['amount'];
					}
				}
			}
			else {
					echo "Error display Error..";	
			}

			echo "Total Income: $total_income" ."<br>";
			echo "Total Expense: $total_expense" . "<br>";
			$savings= $total_income-$total_expense;
			echo "Savings: " .$savings;
		?>
		</div>
	</div>
</div>
<?php include'partial_lower.php'; ?>