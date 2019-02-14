<?php include'include\piechart.php';?>

<div class="card-body" id="piechart_2" style="width:100%; height: 100%;"></div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Category</th>
			<th>Amount</th>
			<th>Date</th>
			<th>Description</th>
			<th style="text-align: right;">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sno = 1;
			$uid = $_SESSION['user'];
			$result = mysqli_query($conn, "SELECT * FROM $table WHERE finance_type_id=2 AND user_id = $uid ORDER BY transaction_date DESC, amount DESC");

		  	while ($row = mysqli_fetch_assoc($result)) {
		  	$category = mysqli_fetch_assoc(mysqli_query($conn,"SELECT category FROM categories WHERE id =".$row['category_id']));
			$label = $category['category'];
			$amount = $row ['amount']; 
			$tdate = $row['transaction_date'];
			$id = $row['id'];
			$info = $row['description'];
		?>
		<tr>
			<td><?= $sno ?></td>
			<td><?= $label ?></td>
			<td>Rs. <?= number_format($amount)?>/-</td>
			<td><?= $tdate ?></td>
			<td><?= $info ?></td>
			<td>
				<span class="pull-right">
						<a class="btn" href="#" data-toggle="modal" data-target="#editdata_<?=$id?>">
							EDIT
						</a>

						<div class="modal fade" id="editdata_<?=$id?>" role="dialog">
						  	<div class="modal-dialog">
						    	<div class="modal-content">
									<div class="modal-body">
											<form class="form" method="post"  action="database/edit_data.php">
												<input type="text" value="<?=$id?>" name="id" hidden>
												<input type="text" value="2" name="finance_type_id" hidden>	
												<div class="row">
													<div class="form-group col">
														<label class="control-label"> Date</label>
									  					<input class="form-control" type="date" name="date_new" value = "<?= $tdate ?>">
													</div>
													<div class="form-group col">
														<label class="control-label" for="Amount">Amount</label>
									  					<input class="form-control" type="text" name="amount_new" value = "<?= $amount ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label" for="Category">Category</label>
													<div class="dropdown">
														<select class="form-control" name="cat_new">
														 <?php
														 	$result2=mysqli_query($conn,"SELECT *FROM categories WHERE finance_type_id=2");
														 	while($row = mysqli_fetch_assoc($result2)){
														 		if($label == $row['category']){
														 ?>
														  <option><?=$row['category']?></option>
														
														<?php
																}
															}
														?>
														<?php
														 	$result2=mysqli_query($conn,"SELECT *FROM categories WHERE finance_type_id=2");
														 	while($row = mysqli_fetch_assoc($result2)){
														 		if($label != $row['category']){
														 ?>
														  <option><?=$row['category']?></option>
														
														<?php
																}
															}
														?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label"> Description</label>
								  					<textarea class="form-control" name="description"><?=$info?></textarea>
												</div>			
												<button class="btn btn-success" name="edit_OK">
														OK
												</button>

												<button class="btn btn-success" data-dismiss="modal">
														Cancel
												</button>
											</form>
									</div>
									
								</div>
							</div>
						</div>
						<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deletedata_<?=$id?>">
							DELETE
						</a>
						<div class="modal fade" id="deletedata_<?=$id?>" role="dialog">
						  	<div class="modal-dialog">
						    	<div class="modal-content">
									<div class="modal-body">
										Are you sure you want to delete this data?
									</div>
									
									<div class="modal-footer">
										<form class="form" method="post" action="database/edit_data.php">
											<input type="text" value="<?=$id?>" name="id" hidden>
											<button class="btn btn-success" name="delete_OK" >
												OK
											</button>
										</form>

											<button class="btn btn-success" data-dismiss="modal">
												Cancel
											</button>
										
									</div>
								</div>
							</div>
						</div>						
				</span>
			</td>

		</tr>
		<?php 
				$sno++; 
			}
		?>
	</tbody>
</table>


