<div class="container"><!-- Modal -->
  	<div class="modal show" id="myModal" role="dialog">
    	<div class="modal-dialog">
    	<!--Content Preparation-->
    	<?php
    		$sql = "SELECT * from users WHERE id=$uid";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			$name = $row['name']; //User Name
			$sql = "SELECT quote FROM quotes ORDER BY RAND() LIMIT 1";
			$result1 = mysqli_query($conn,$sql);
			$row1 = mysqli_fetch_assoc($result1);
			$quote = $row1['quote'];
    	?>	
      	<!-- Modal content-->
    		<div class="modal-content">
    	    	<div class="modal-header">
    	    		<h4 class="modal-title">Welcome <?=$name?></h4>
    			</div>
    	    	<div class="modal-body">
    	    		<p>Quote of the Day:<br><?=$quote?></p>
     	   	</div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
    	</div>
    </div>
  	</div>
</div>