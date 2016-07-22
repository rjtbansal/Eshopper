<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<li><a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock"></i>
								
					<?php 
					
					echo 'Welcome manager '.$_SESSION['mgr_id'];
					?> 
					<strong class="caret"></strong>
					<ul class="dropdown-menu">
					<li>
					<a href="index.php"><span class="glyphicon glyphicon-off"></span> Sign out</a>
					<?php
						//session_destroy();
					?>
					</li> 
					</a></li>
                                
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			
				
				<div class="col-sm-9">
					<div class="features_items padding-right"><!--features_items -->
						<h2 class="title text-center">Features Items</h2>
						
										<?php

											$connect=mysqli_connect("localhost","root","root","databasenew");
											//mysql_select_db("databasenew");
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$monthlySummariesQuery="SELECT c_purchase.order_id, c_purchase.customer_id, item.item_id, item.title, item.price, item.quantity, c_purchase.cquantity, c_purchase.p_date FROM manager,c_purchase,item WHERE c_purchase.customer_id = item.customer_id AND(c_purchase.p_date LIKE '2015-05-%%');";
											
											if($monthlySummariesResult=mysqli_query($connect,$monthlySummariesQuery)){
												echo 'Purchase Summary for the month of May
													 <table border="1"><tr><th>Order_Id</th>
													 <th>Customer_Id</th>
													 <th>Item_Id</th>
													 <th>Title</th>
													 <th>Price in $</th>
													 <th>Item Quantity</th>
													 <th>Purchased Quantity</th>
													 <th>Purchase_Date</th></tr>';
													 
													 while($row=mysqli_fetch_array($monthlySummariesResult)){
														$orderId[]=$row['order_id'];
														$customerId[]=$row['customer_id'];
														$itemId[]=$row['item_id'];
														$titles_summary[]=$row['title'];
														$price[]=$row['price'];
														$quantity[]=$row['quantity'];
														$purchasedQuantity[]=$row['cquantity'];
														$purchaseDate[]=$row['p_date'];
													 }
													 
													 foreach($orderId as $index => $order){
														echo "<tr><td>".$order."</td>
																<td>".$customerId[$index]."</td>
																<td>".$itemId[$index]."</td>
																<td>".$titles_summary[$index]."</td>
																<td>".$price[$index]."</td>
																<td>".$quantity[$index]."</td>
																<td>".$purchasedQuantity[$index]."</td>
																<td>".$purchaseDate[$index]."</td></tr>";
													 }
													 
													 echo "</table><br/>";
											}
											
											$monthlySummaryQuery="SELECT c_purchase.order_id, c_purchase.customer_id, item.item_id, item.title, item.price, item.quantity, c_purchase.cquantity, c_purchase.p_date FROM manager,c_purchase,item WHERE c_purchase.customer_id = item.customer_id AND (c_purchase.p_date LIKE '2015-06-%%');";
											
											if($monthlySummaryResult=mysqli_query($connect,$monthlySummaryQuery)){
												echo 'Purchase Summary for the month of June
													 <table border="1"><tr><th>Order_Id</th>
													 <th>Customer_Id</th>
													 <th>Item_Id</th>
													 <th>Title</th>
													 <th>Price in $</th>
													 <th>Item Quantity</th>
													 <th>Purchased Quantity</th>
													 <th>Purchase_Date</th></tr>';
													 
													 while($row=mysqli_fetch_array($monthlySummaryResult)){
														$orderId1[]=$row['order_id'];
														$customerId1[]=$row['customer_id'];
														$itemId1[]=$row['item_id'];
														$titles_summary1[]=$row['title'];
														$price1[]=$row['price'];
														$quantity1[]=$row['quantity'];
														$purchasedQuantity1[]=$row['cquantity'];
														$purchaseDate1[]=$row['p_date'];
													 }
													 
													 foreach($orderId1 as $index => $order){
														echo "<tr><td>".$order."</td>
																<td>".$customerId1[$index]."</td>
																<td>".$itemId1[$index]."</td>
																<td>".$titles_summary1[$index]."</td>
																<td>".$price1[$index]."</td>
																<td>".$quantity1[$index]."</td>
																<td>".$purchasedQuantity1[$index]."</td>
																<td>".$purchaseDate1[$index]."</td></tr>";
													 }
													 
													 echo "</table><br/>";
											}
											?>	 
					
				</div>
		</div>
	</section> 
	
	<footer id="footer"><!--Footer-->		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 Sarah's BookStore Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href=#>Sarah Wang</a></span></p>
				</div>
			</div>
		</div>
		
	</footer> <!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>