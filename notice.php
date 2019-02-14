<?php 
	$title = "Notices and FAQs";
?>
<?php include'database/maintainance_check.php'; ?>
<?php include'partial_upper.php'; ?>
<div class="container">
	<div class="card">
	<ul class="list-group list-group-flush">
<?php
	$sql = "select *from notices";
	$result = mysqli_query($conn,$sql);
	$check="read";
	$sno=1;
	while($row=mysqli_fetch_assoc($result)){
?>
		<a class="list-group-item" href="/previewnotice.php?count=<?=$row['id']?>">
			<?= $sno;?>.&nbsp;
			<?= $row['title'];?>
			
			<span class="pull-right">
				<?= $row['updated_at'];?>
				
					<?php
						$cookieIndex = $check.$row['id'];
						if(!isset($_COOKIE[$cookieIndex])  || $_COOKIE[$cookieIndex]==0){
							echo '<span class="label label-warning">Unread</span>';
						}
					?>
			</span>
		</a>

		<?php
		 	$sno++;
		}
?>
	</ul>
	</div>
</div>

<?php include'partial_lower.php'; ?>