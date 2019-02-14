<?php include'include\fusioncharts.php'; ?>

<?php
    $uid = $_SESSION['user'];
    $strQuery = "SELECT transaction_date, finance_type_id, SUM(amount) FROM finances WHERE user_id = $uid GROUP BY transaction_date ORDER BY transaction_date ASC;";
    $result = mysqli_query($conn,$strQuery);

    $strQuery2 = "SELECT transaction_date, finance_type_id, SUM(amount) FROM finances WHERE user_id = $uid GROUP BY finance_type_id, transaction_date ORDER BY transaction_date ASC;";
    $result2 = mysqli_query($conn,$strQuery2);

    if ($result) {
        $arrData = array(
            "chart" => array(
            "caption"=> "Budget",
            "xAxisname"=> "Day",
            "yAxisName"=> "Money (In Rs.)",
            "numberPrefix"=> "Rs.",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
            )
        );
        
        // creating array for categories object
        $categoryArray=array();
        $dataseries1=array();
        $dataseries2=array();

        // pushing category array values
        while($row = mysqli_fetch_array($result)) {
            array_push($categoryArray, array(
                "label" => $row["transaction_date"]  //put categories here later
            )
            );
        }
        while($row = mysqli_fetch_array($result2)) {
            if($row['finance_type_id'] == 1){
                array_push($dataseries1, array(
                    "value" => $row["SUM(amount)"]
                    )
                );
            }else{
                array_push($dataseries2, array(
                    "value" => $row["SUM(amount)"]
                    )
                );
            }
        }

        $arrData["categories"]=array(array("category"=>$categoryArray));
        
        // creating dataset object
        $arrData["dataset"] = array(array("seriesName"=> "Income","data"=>$dataseries1),array("seriesName"=> "Expense","data"=>$dataseries2));

        /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
        $jsonEncodedData = json_encode($arrData);

        // chart object
        $msChart = new FusionCharts("mscombi2d", "chart1" , "100%", "100%", "chart-container", "json", $jsonEncodedData);

        // Render the chart
        $msChart->render();
   }

?>

<center>
    <div id="chart-container">
        Chart will render here!
    </div>
</center>