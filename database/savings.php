<?php	
	require_once 'connection.php';
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$uid = $_SESSION['user'];

	if(isset($_POST['set'])){
		$cur_month =date("m");
	
		$month = mktime(0,0,0,$cur_month,0,0);
		$expected_savings = mysqli_real_escape_string($conn,$_POST['expected_savings']);

		$total_income = 0;
		$total_expense = 0;

		$sql="SELECT amount,finance_type_id FROM finances WHERE user_id='$uid' AND MONTH(transaction_date) = '$cur_month'";
		$result=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
			if($row['finance_type_id'] == 1){
				$total_income += $row['amount'];
			}else{
				$total_expense += $row['amount'];
			}
		}
		$current_savings = $total_income - $total_expense;

		$sql = "SELECT * FROM savings WHERE user_id='$uid'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){
				if($row['month_of_transaction'] == $cur_month){
					$sql1 = "UPDATE savings SET expected_savings='$expected_savings'";
				}else{
					$sql1 = "INSERT INTO savings(user_id,month_of_transaction,expected_savings,calculated_savings)
								VALUES('$uid','$cur_month','$expected_savings','$current_savings')";
					mysqli_query($conn,$sql1);
				}
			}
			}else{
					$sql1 = "INSERT INTO savings(user_id,month_of_transaction,expected_savings,calculated_savings)
								VALUES('$uid','$cur_month','$expected_savings','$current_savings')";
					mysqli_query($conn,$sql1);
			}
		header('location:/overview.php');
	}
	else{
		echo "No value set";
	}
?>