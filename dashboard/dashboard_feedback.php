<h6 class="card-header">Feedback</h6>

<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Title</th>
			<th>Feedback Body</th>
			<th>User</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "select * from feedback";
			$result = mysqli_query($conn,$sql);
			$sno = 1; 
			while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $sno ?></td>
			<td><?= $row['title'] ?></td>
			<td class="text-truncate" style="max-width: 1px;">
				<a href="#" data-toggle="modal" data-target="#exampleModal_<?=$sno?>">
					<?= $row['body'] ?>
				</a>
				<div class="modal fade" id="exampleModal_<?=$sno?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title" id="exampleModalLabel<?=$sno?>"><?= $row['title'] ?></h5>
				      		</div>
				      		<div class="modal-body">
				        		<?= $row['body'] ?>
				      		</div>
				      		<div class="modal-footer">
				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      		</div>
				    	</div>
				  	</div>
				</div>
			</td>
			<td><?=$row['user_id']?></td>
		</tr>
		<?php 
				$sno++; 
			}
		?>
	</tbody>
</table>