<div class="card-body">

<div class="card-header">
	<h2>
		Frequency Transaction
	</h2>
</div>
<div class="row">
	<div class="card-body">
		<?php
			$sql = "SELECT * FROM frequency";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)){
		?>
			<a href="dashboard_freq.php" class="btn btn-info">
				
					<?=$row['frequency_type']?>
			</a>

		<?php } ?>
	</div>
</div>

</div>