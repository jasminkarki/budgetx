 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php 
      $title = "Chart";
      $conn_exp = mysqli_connect('localhost', 'root', '', 'budgetxdb'); ?>
      function drawChart() {
        var data = new google.visualization.DataTable();
          
        data.addColumn('string', 'Label');
        data.addColumn('number', 'Amount');
        
        <?php $result = mysqli_query($conn_exp, "SELECT day, amount FROM expenses");
          while ($row = mysqli_fetch_assoc($result)) {
                            $label = $row ['day'];
                            $amount = $row ['amount']; 
          
                  echo "data.addRow( ['day ".$label."' , $amount]);";} 
        ?>      
                
        var options = {'title':'Expenses',
                       'is3D': true,
                       'width': 500, 
                       'height': 500};
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data); //Draws PieChart
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 500px; height: 500px;"></div>
  </body>
</html>


