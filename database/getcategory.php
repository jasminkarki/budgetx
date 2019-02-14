<?php
	session_start();
	require_once('connection.php'); 
	if(isset($_GET['cat'])){
		if($_GET['cat'] == "income"){
			$fid = 1;
		}else if($_GET['cat'] == "expense"){
			$fid = 2;
		}
		$query = "SELECT category FROM categories WHERE finance_type_id = $fid";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result)){
			echo "<option selected>".$row['category']."</option>";
		}
	}
?>