<?php
	require_once('connection.php');
	
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

	$uid = $_SESSION['user'];
	$current_time = date("Y-m-d");

	$cur_month =date("m");
	$cur_day = date("d");
	$last_day = date("t", strtotime('today'));
	$rem_days = $last_day - $cur_day;
	$total_income = 0;
	$total_expense = 0;

	//CALCULATE TOTAL INCOME AND EXPENSE

	$sql="SELECT amount,finance_type_id FROM finances WHERE user_id='$uid' AND MONTH(transaction_date) = '$cur_month'";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
		if($row['finance_type_id'] == 1){
			$total_income += $row['amount'];
		}else{
			$total_expense += $row['amount'];
		}
	}

	//SET CALCULATED SAVINGS AND EXPECTED SAVINGS TO TABLE
	$average_spend = round($total_expense/$cur_day, 2);
	$current_savings = $total_income - $total_expense;
	$sql = "UPDATE savings SET calculated_savings='$current_savings' WHERE user_id='$uid' AND month_of_transaction ='$cur_month'";
	$res = mysqli_query($conn,$sql);

	if(isset($_POST['set'])){
		$expected_savings = mysqli_real_escape_string($conn,$_POST['expected_savings']);
		$result = mysqli_query($conn, "SELECT *FROM savings");
		while($row=mysqli_fetch_assoc($result)){
			if($row['month_of_transaction'] == $cur_month && $row['user_id'] == $uid){
				$sql1 = "UPDATE savings SET expected_savings='$expected_savings' WHERE user_id='$uid' AND month_of_transaction ='$cur_month'";
				mysqli_query($conn,$sql1);
			}
			else{
				$sql1 = "INSERT INTO savings(user_id,month_of_transaction,expected_savings,calculated_savings)
					VALUES('$uid','$cur_month','$expected_savings','$current_savings')";
				mysqli_query($conn,$sql1);
			}
		}

		header('location:/overview.php');
	}

	// AUTO ADD TO INCOME OR EXPENSE BASED ON FREQUENCY
	$result = mysqli_query($conn, "SELECT * FROM finances WHERE user_id = $uid ORDER BY transaction_date DESC, amount DESC");
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$time = $row['last_transaction_date'];
			$amount = $row['amount'];
			$freq = $row['frequency'];
			$f_id = $row['finance_type_id'];
			$c_id = $row['category_id'];
			$description =$row['description'];
			if($current_time > $time){
				if($freq == 2){
					$time = date ("Y-m-d", strtotime ($time ."+1 day"));
					while($current_time>$time){
						$sql = "INSERT INTO finances (user_id, finance_type_id, amount, transaction_date, category_id, frequency,description)
						 	VALUES ('$uid', '$f_id', '$amount', '$time', '$c_id', 5,'$description')";
						mysqli_query($conn,$sql);
						$time = date ("Y-m-d", strtotime ($time ."+1 day"));
					}
				}
				if($freq == 3){
					$time = date ("Y-m-d", strtotime ($time ."+7 days"));
					while($current_time>$time){
						$sql = "INSERT INTO finances (user_id, finance_type_id, amount, transaction_date, category_id, frequency,description)
						 	VALUES ('$uid', '$f_id', '$amount', '$time', '$c_id', 5,'$description')";
						mysqli_query($conn,$sql);
						$time = date ("Y-m-d", strtotime ($time ."+7 days"));
					}
				}
				if($freq == 4){
					$time = date ("Y-m-d", strtotime ($time ."+30 days"));
					while($current_time>$time){
						$sql = "INSERT INTO finances (user_id, finance_type_id, amount, transaction_date, category_id, frequency,description)
						 	VALUES ('$uid', '$f_id', '$amount', '$time', '$c_id', 5,'$description')";
						mysqli_query($conn,$sql);
						$time = date ("Y-m-d", strtotime ($time ."+30 days"));
					}
				}
				mysqli_query($conn,"UPDATE finances SET last_transaction_date='$time' WHERE id='$id'");
			}
		}
		//end while
	}
	else{
		echo mysqli_error($conn);
	}
	
	// SAVINGS MESSAGE SECTION
	$result=mysqli_query($conn,"SELECT *FROM savings WHERE month_of_transaction ='$cur_month' AND user_id = '$uid'");
	while($row = mysqli_fetch_assoc($result)){
		$required_avg = round(($current_savings-$row['expected_savings'])/$rem_days, 2);

		if($row['expected_savings'] < $row['calculated_savings']){
			if ($average_spend>$required_avg){
				$_SESSION['auto_message'] = 
				  "Your targeted savings is Rs. ".$row['expected_savings']. ".<br>Your current savings is Rs." .$row['calculated_savings'].
				  ".<br>
				  Keep your Daily expenditure below Rs. ".$required_avg." to meet your target.<br>But since your average daily expenditure for this month is Rs. ".$average_spend." is greater than required daily average, you might want to control your expenses from now on." ;
			}
			else{
				$_SESSION['auto_message'] = 
				  "Your targeted savings is Rs. ".$row['expected_savings']. ".<br>Your current savings is Rs." .$row['calculated_savings'].
				  ".<br>
				  Keep your Daily expenditure below Rs. ".$required_avg." to meet your target.<br>Your average daily expenditure for this month currently is just Rs. ".$average_spend." so keep spending like you are and you'll be fine." ;
			}
		}else if($row['expected_savings'] == $row['calculated_savings']){
			$_SESSION['auto_message'] = 
				 "Your targeted savings is Rs. ".$row['expected_savings']. ".<br>Your current savings is Rs." .$row['calculated_savings'].
				  ".<br>Your current savings has met your targeted savings goal.
				 Please update your expected savings if you want to change your savings goal.";
		}else{
			$_SESSION['auto_message'] = 
				 "Your targeted savings is Rs. ".$row['expected_savings']. ".<br>Your current savings is Rs." .$row['calculated_savings'].
				  ".<br>Your current savings is already less than targeted savings.
				 Please update your expected savings if you want to change your savings goal.";
		}
	}
	
?>