<?php 
	$title = "BudgetX";
?>

<?php include 'database\authcheck.php'; ?>
<?php include'database\maintainance_check.php'; ?>
<?php require_once'database\automate.php';?>
<?php $table = 'finances' ?>
<?php include'partial_upper.php'; ?>
<?php include'include\piechart.php'; ?>
<?php include'include\quotes.php'; ?>
<?php include'partial_scripts.php'; ?>

<?php
	$sql = "SELECT * from users WHERE id=$uid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if($row['quote_pref']==1){
		if(!isset($_SESSION['quote_shown']) || (isset($_SESSION['quote_shown']) && $_SESSION['quote_shown'] == false)){
?>
		<script type="text/javascript">
		    $(window).on('load',function(){
		        $('#myModal').modal('show');
		    });
		</script>
<?php 
		$_SESSION['quote_shown'] = true;
		}
	}
?>

<div class="container-fluid">
<div class="row">
	<div class="container col-sm-12 col-xs-2 col-md-2">
		<div class="card">
			
				<ul class="list-group list-group-flush">
				<a class="list-group-item" href="/overview.php">Overview</a>
				<a class="list-group-item" href="?type=income">Income</a>
				<?php if(isset($_GET['type']) && ($_GET['type'] == 'income' || $_GET['type'] == 'category_i')){?>
						<?php
							$sql = "SELECT * from categories WHERE finance_type_id=1";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($result)){
						?>
							<a href = "?type=category_i&&cat=<?=$row['id']?>" class="list-group-item"><span class="text-muted ml-3"><?=$row['category']?></span></a>
						<?php } ?>
				<?php } ?>
				<a class="list-group-item" href="?type=expense">Expense</a>
				<?php if(isset($_GET['type']) && ($_GET['type'] == 'expense' || $_GET['type'] == 'category_e')){?>
					<?php
						$sql = "SELECT * from categories WHERE finance_type_id=2";
						$result = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($result)){
					?>
						<a href = "?type=category_e&&cat=<?=$row['id']?>" class="list-group-item text-muted"><span class="text-muted ml-3"><?=$row['category']?></span></a>
					<?php } ?>
				<?php } ?>
				<a class="list-group-item" href="?type=profile">Profile</a>
				<a class="list-group-item" href="?type=settings">Settings</a>
				<a class="list-group-item" href="?type=feedback">Send Feedback</a>
  				<!-- Trigger the modal with a button -->
  				<a class="list-group-item" data-toggle="modal" href="#myModal">Random Quotes</a>
			</ul>	
		</div>
	</div>

	<div class="container col-md-10" style="margin-left: -15px;">
		<?php if(isset($_GET['type'])) { ?>
					<div class="card">
						<?php include 'user_dashboard/dashboard_'.$_GET['type'].'.php'; ?>
					</div>
		<?php }

		else{ ?>
		<div class="container-fluid">
		<div class="row">
			<div class="card col-md-8" style="padding:0;">
				<h6 class="card-header"><strong>Expected Savings</strong></h6>
				<div class="card-block" style="margin-bottom: 15px;">
					<?php
						if(isset($_SESSION['auto_message']) && ($_SESSION['auto_message']!= null)){
							echo $_SESSION['auto_message'];
						}else{
							echo "No expectances set yet.";
						}
					?>
				</div>
				<h6 class="card-header"><strong>Last 30 Days</strong></h6>
				<?php include'include\barchart.php';?>
			</div>
			<div class="card col-md-4" style="padding:0;">
				<h6 class="card-header"><strong>Set Savings Target</strong></h6>
				<div class="card-block">
					<form class="form" action="\database\savings.php" method="post">
						<div class="form-group">
							<label>Expected Savings For 
							<?php
								$date_month=date('F', mktime(0, 0, 0, date("m")));
								echo $date_month;
							?>
							</label>
							<input class="form-control" type="text" name="expected_savings" required>
						</div>
						<div class="form-group">
							<button class="btn btn-success" name="set">Set</button>
						</div>

					</form>
				</div>
				<h6 class="card-header"><strong>Add Transaction</strong></h6>
				<div class="card-block">
					<form class="form" action ="database\transaction.php" method="post">
						<div class="form-group">
							<input type="radio"  onclick="get_categories()" class="ftype" name="ftype" value="income" checked>Income &nbsp; &nbsp; &nbsp;
							<input type="radio"  onclick="get_categories()" class="ftype" name="ftype" value="expense">Expense
						</div>
						<div class="form-group">
		  					<label class="control-label">Transaction Frequency</label>
		  					<select class="form-control" input type ="text" name = "frequency">
								<option value="1">One Time</option>
								<option value="2">Daily</option>
								<option value="3">Weekly</option>
								<option value="4">Monthly</option>
							</select>
		  				</div>
						<div class="row">
							<div class="form-group col">
								<label class="control-label">Transaction Date</label>
								<input class="form-control" type = "date" name="tdate" required>
							</div>
							<div class="form-group col">
								<label class="control-label">Amount</label>
								<input class="form-control" type="unsigned float" name="amount" placeholder="Rs." required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Category</label>
							<select id = "categorySelect" class="form-control" input type ="text" name = "category" required>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea class="form-control" name="description" placeholder="Description for the transaction"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-success" name="submit">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
	<?php } ?>
</div>
</div>
<?php include'partial_lower.php'; ?>

<script type="text/javascript">
	$(document).ready(get_categories);
	function get_categories(){
		var radio_value = $(".ftype:checked").val();
   		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("categorySelect").innerHTML = this.responseText;
            }
        };
    xmlhttp.open("GET","database/getcategory.php?cat="+radio_value,true);
    xmlhttp.send();
	}
</script>
