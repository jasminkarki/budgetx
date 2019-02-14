<?php 
	$sql = "SELECT * from users WHERE id=$uid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$mode_quote_pref = $row['quote_pref'] == 1?"checked":"";
?>

<div class="card-body">
	<form action="/database/toggle_quote_pref.php" method="post">
		<input type="hidden" name="toggle_quote_pref" value="0">
		<div class="togglebutton">
	    	<input type="checkbox" name="toggle_quote_pref" value = "1" <?=$mode_quote_pref?>>
			Daily Quotes
		</div>
		<button type="submit" class="btn btn-success">
			Save settings
		</button>
	</form>
</div>

