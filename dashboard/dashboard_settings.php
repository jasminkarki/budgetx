<?php 
	$sql = "SELECT * from admin_settings";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$mode_maintainance = $row['maintainance'] == 1?"checked":"";
	$mode_setting2 = $row['settings'] == 1?"checked":"";
?>

<div class="card-body">
	<form action="/database/toggle_maintainance.php" method="post">
		<input type="hidden" name="toggle_maintainance" value="0">
		<div class="togglebutton">
	    	<input type="checkbox" name="toggle_maintainance" value = "1" <?=$mode_maintainance?>>
				Maintainance Mode
		</div>
	
	<div class="togglebutton">
	    <input type="checkbox" value="1" <?=$mode_setting2?>>
		Setting #2
	</div>

	<button type="submit" class="btn btn-success">
		Save settings
	</button>
	</form>
</div>

