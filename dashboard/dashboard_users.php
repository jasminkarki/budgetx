<h6 class="card-header">Users</h6>

<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Page Visits</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "select * from users";
			$result = mysqli_query($conn,$sql);
			$sno = 1; 
			$total = 0;
			while($row = mysqli_fetch_assoc($result)){
				$total+=$row['count'];
		?>
		<tr>
			<td><?= $sno ?></td>
			<td><?= $row['name'] ?></td>
			<td><?= $row['email'] ?></td>
			<td><?= $row['count'] ?></td>
		</tr>
		<?php $sno++; } ?>
		<tr>
			<td></td>
			<td><b>Total</b></td>
			<td></td>
			<td><?= $total ?></td>
		</tr>
	</tbody>
</table>