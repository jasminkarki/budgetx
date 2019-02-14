<?php 
	$title = "Dashboard";
?>
<?php include 'database/admin_check.php'; ?>

<?php include'partial_upper.php'; ?>
<div class="row no-gutters" style="padding-left: 16.67%;height: 100%;">
	<div class="col-sm-2 col-xs-2 col-md-2" style="position:fixed; left:0; height: 100%;z-index: 1000;">
		<div class="card" style="min-height:100%;">
			<ul class="list-group list-group-flush">
				<a class="list-group-item" href="dashboard_admin.php">Dashboard</a>
				<a class="list-group-item" href="?type=users">Users</a>
				<a class="list-group-item" href="?type=notices">Notices</a>
				<a class="list-group-item" href="?type=feedback">Feedback</a>
				<a class="list-group-item" href="?type=settings">Settings</a>
			</ul>
		</div>
	</div>

	<div class="col-sm-12 col-xs-12 col-md-12" style="height: 100%;">
		<div class="card" style="min-height:100%">	
			<div class="card-body">
				<?php
					if(isset($_GET['type'])) {
						include 'dashboard/dashboard_'.$_GET['type'].'.php';
					}else{
				?>
				
				<div class="row">
					<div class="container col-md-4">
						<div class="card">
							<a href="?type=users">
								<div class="card-body">
									<strong>Active Users</strong>
									
									<?php
										$sql = "select SUM(count) from users";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_assoc($result);
										$total = $row['SUM(count)'];
									?>
									<br>
									<span class="text"><?=$total?></span> <br>									
									
									<span class="text-muted">Put graph here</span>
								</div>
							</a>
						</div>
					</div>

					<div class="container col-md-4">
						<div class="card">
							<a href="#">
								<div class="card-body">
									<strong>Total Visits</strong>
									<br>
									<?php 
										$sql = "SELECT * FROM counts where id=1";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_assoc($result);
										$count = $row['visits'];
									?>
									<span class="text"><?=$count?></span> <br>
									<span class="text-muted">Put graph here</span>
								</div>
							</a>
						</div>
					</div>

					<div class="container col-md-4">
						<div class="card">
							<a href="?type=feedback">
								<div class="card-body">
									<strong>Feedback</strong>
									<br>
									<span class="text-muted">Put graph here</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>

</div>

<?php include'partial_lower.php'; ?>