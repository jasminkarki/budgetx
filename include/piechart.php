<script type="text/javascript" src="\assets\chart-loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart1);
	google.charts.setOnLoadCallback(drawChart2);
	<?php if(!isset($condition)) $condition = ""?>
	function drawChart1() {
		var data = new google.visualization.DataTable();
	  	data.addColumn('string', 'Label');
		data.addColumn('number', 'Amount');
		<?php 
			$uid = $_SESSION['user'];
			$result = mysqli_query($conn, "SELECT *,SUM(amount) FROM $table WHERE finance_type_id=1 AND user_id = $uid GROUP BY category_id");
		?>

		<?php
		  	while ($row = mysqli_fetch_assoc($result)) {
		  	$category = mysqli_fetch_assoc(mysqli_query($conn,"SELECT category FROM categories WHERE id =".$row['category_id']));
			$label = $category['category'];
			$amount = $row ['SUM(amount)'];
		  
			echo "data.addRow( ['$label' , $amount]);";}
		?>   
			
		var options = {
			'title' : 'Income',
			// 'legend' : 'none',
			//width and height not given. takes fron div.
	  	};
	  	var chart = new google.visualization.PieChart(document.getElementById('piechart_1'));
		chart.draw(data,options); //Draws PieChart
	}

	function drawChart2() {
		var data = new google.visualization.DataTable();
	  	data.addColumn('string', 'Label');
		data.addColumn('number', 'Amount');
		<?php 
			$result = mysqli_query($conn, "SELECT *,SUM(amount) FROM $table WHERE finance_type_id=2 AND user_id = $uid GROUP BY category_id");
		?>

		<?php
		  	while ($row = mysqli_fetch_assoc($result)) {
			$category = mysqli_fetch_assoc(mysqli_query($conn,"SELECT category FROM categories WHERE id =".$row['category_id']));
			$label = $category['category'];
			$amount = $row ['SUM(amount)']; 
		  
			echo "data.addRow( ['$label' , $amount]);";}
		?>   
			
		var options = {
			'title' : 'Expense',
			// 'legend' : 'none',
			//width and height not given. takes fron div.
	  	};
	  	var chart = new google.visualization.PieChart(document.getElementById('piechart_2'));
		chart.draw(data,options); //Draws PieChart
	}
</script>
