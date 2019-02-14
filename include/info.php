<h5 class="card-header">Overall Info</h5>
<div class="card-body">
<?php
	$sql="SELECT SUM(amount),finance_type_id FROM finances GROUP BY finance_type_id ORDER BY finance_type_id";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			if($row['finance_type_id']==1) $total_income = $row['SUM(amount)'];
			if($row['finance_type_id']==2) $total_expense = $row['SUM(amount)'];
		}
	}
	else {
			echo "Error display Error..";	
	}

	echo "<b>Total Income:</b> $total_income" ."<br>";
	echo "<b>Total Expense:</b> $total_expense" . "<br>";
	$savings= $total_income-$total_expense;
	echo "<b>Savings:</b> $savings";
?>
</div>