<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Income</th>
			<th>Date</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sno = 1;
			$uid = $_SESSION['user'];
			$cat = $_GET['cat'];
			$result = mysqli_query($conn, "SELECT * FROM $table WHERE finance_type_id=1 AND user_id = $uid AND category_id = $cat ORDER BY transaction_date DESC, amount DESC");

		  	while ($row = mysqli_fetch_assoc($result)) {
			$amount = $row ['amount']; 
			$tdate = $row['transaction_date'];
			$info = $row['description'];
		?>
		<tr>
			<td><?= $sno ?></td>
			<td>Rs. <?= number_format($amount)?>/-</td>
			<td><?=$tdate ?></td>
			<td><?= $info ?></td>
		</tr>
		<?php 
				$sno++; 
			}
		?>
	</tbody>
</table>
