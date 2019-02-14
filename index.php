<?php include 'database/redirect_if_loggedin.php'; ?>
<?php include'database/maintainance_check.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="/landing-page/assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Canonical SEO -->
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/landing-page.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body id="landing-body" class="landing-page landing-page2">       
        <div class="wrapper">
            <div class="parallax filter-gradient green" data-color="green">
                <div class= "container">
                    <div class="row">
                    	<div class="col-md-7 hidden-xs">
                    		<div class="parallax-image">
                    			<img src="assets/images/index.png" class="rounded" alt="photo here!!" >
                    		</div>
                    	</div>
                        
                        <div class="col-md-5"> 
                            <div class="description text-center">
                                <h2>BudgetX</h2>
                                <br>
                                <h5>A solution to your unorganized financial lifestyle. <em>BudgetX</em> is here to help you solve your life crisis. A simple solution to your finances.                                    
                                </h5>

                                <a href="login.php" class="btn btn-fill btn-neutral">
                                	<i class="fa fa-user"></i>
                                	Continue using BudgetX
                                </a>
                                <h4>
                                	Haven't signed up yet?
                                </h4>
                                <a href="register.php" class="btn btn-fill btn-neutral">                                    	
                                	<i class="fa fa-user"></i>
                                	Get started here.
                                </a>

                                	
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-gray section-clients">
            	<!-- section for the decotaion only -->
                <div class="container text-center justified">
                    <h3>About <b>BudgetX</b></h3>
                    <p>
                        BudgetX is a finance manager that aids you to orgnaize their overall budget, income, expenses and allowances. It is aimed to help you keep track of your accounts and create feasible budget plans with a simple, easy-to-use interface. The pre-built automation of the tasks will assist you with simple task automation. Feasible to any age-group, you can easily manage economical aspect of your life.
                    </p>
                   
                </div>
            </div>

            <div class="section section-presentation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 hidden-xs">
                            <div class="description">
                                <h4 class="header-text">Track finances</h4>
                                <p>
                                    Keep records of your inflow and outflow. <br>
                                    
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="/assets/images/monitor.png" style="margin-top:-50px;" alt="Overview Page Image here">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-demo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="demo-image">
                                <img src="assets/images/index.png" alt="Which image here??">
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <h4 class="header-text">Plan ahead</h4>
                            <p>
                                Set a saving target. <br>
                                Get possible expenditure calculated accordingly.
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <h4 class="header-text">Automate Tasks</h4>
                            <p>
                                Have balance paid to certain fields automatically. <br>
                                Set the day of regular payment. And never worry about it again.
                            </p>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <div class="demo-image">
                                <img src="/assets/images/index.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-features">
                <div class="container">
                    <h4 class="header-text text-center">Features</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-green">
                                <div class="icon">
                                    <img src="/assets/images/icon-finances.png">
                                </div>
                                <h3>Finance Tracking</h3>
                                <p>
                                    BudgetX will help you keep track of the expenses and incomes. BudgetX will forsee your budget flow and keep track of it, and show you how you have been spending your money.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-green">
                                <div class="icon">
                                    <img src="/assets/images/icon-plan.png">
                                </div>
                                <h3>Budget Planning</h3>
                                <p>
                                    You will be able to obtain feasible budget plans according to your lifestyle. The finance tracking feature of BudgetX will generate budget plans for use. Or you can even create a budget plan for yourself and save/spend according to your own plan. Live a organized life.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-green">
                                <div class="icon">
                                    <img src="/assets/images/icon-automate.png">
                                </div>
                                <h3>Task Automation</h3>
                                <p>
                                    BudgetX will assist you with simple task automation. You can set up fields for you income such as investment or property or expense such as taxation and rent for automation of task. Taxation system used percenta based method to show net income and net expense.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="section section-no-padding">
                <div class="parallax filter-gradient green" data-color="green">
                    <div class="parallax-background">
                        <img class ="parallax-background-image" src="/assets/images/bg2.jpg">
                    </div>
                    <div class="info">
                        <h1 class="header-text">Start using BudgetX</h1>
                        <p>Start organizing your life</p>
                        <a href="register.php" class="btn btn-fill btn-neutral btn-lg">Get started</a>
                    </div>
                </div>
            </div>
            
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>
    </body>
</html>

<?php
    $sql = "SELECT * FROM counts WHERE id = 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $prev_count = $row['visits'];
    $new_count = $prev_count + 1;
    $sql = "UPDATE counts SET visits=$new_count WHERE id = 1";
    $result = mysqli_query($conn,$sql);
?>
