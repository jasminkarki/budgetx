<nav class="navbar navbar-expand-lg bg-success fixed-top">
  	<a class="navbar-brand" href="/">BudgetX</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fa fa-user" style="color:white;"></span>
  	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	
	<!-- <ul class="navbar-nav mr-auto">	
  		DO NOT REMOVE THIS! TO USE LATER.
  		 <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  			Dropdown
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  	<a class="dropdown-item" href="#">Action</a>
			  	<a class="dropdown-item" href="#">Another action</a>
			  	<div class="dropdown-divider"></div>
			  	<a class="dropdown-item" href="#">Something else here</a>
			</div>
  		</li>
	</ul> -->

	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="/notice.php">
				<i class="fa fa-bell"></i>
				Notice and FAQs
			</a>
		</li>	
		<?php
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
		?>
			<li class="nav-item">
				<a class="nav-link" href="/overview.php/?type=profile">	
					<?php //move to functions 
						$uid = $_SESSION['user'];
						$result = mysqli_query($conn,"SELECT image_path,name FROM users WHERE id = $uid");
						$row = mysqli_fetch_assoc($result);
						$image = $row['image_path'];
					?>
					<img src="<?=$image?>" alt="image here" style="width: 25px; height:25px;" class="rounded-circle">
					<?=$row['name']?>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="\database\logout.php">Logout</a>
			</li>
		<?php
		}
		else{
		?>
			<li class="nav-item">
				<a class="nav-link" href="\login.php">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="\register.php">Register</a>
			</li>
		<?php
		}
		?>
		
	</ul>

	</div>
</nav>