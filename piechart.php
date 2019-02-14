<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  	google.charts.load('current', {packages:['corechart']});
  	google.charts.setOnLoadCallback(drawChart);
  
  	function drawChart() {
    	var data = new google.visualization.DataTable();
      
    	data.addColumn('string', 'Label');
	   data.addColumn('number', 'Amount');
    
    	<?php $result = mysqli_query($conn, "SELECT category_id, amount, finance_type_id FROM finances");
      while ($row = mysqli_fetch_assoc($result)) {
      	$label = $row ['category_id'];
      	$amount = $row ['amount']; 
      
        echo "data.addRow( ['".$label."' , $amount]);";}
    	?>      
            
    	var options = {
    		'title' : 'Expenses',
    		'legend' : 'none',
    		//width and height not given. takes fron div.
      };
    	var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    	chart.draw(data,options); //Draws PieChart
  	}	  
</script>
