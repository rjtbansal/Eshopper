<?php

session_start();
$item_id=$_GET['item_id'];
$email=$_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
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
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
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
								
								<?php
								$connect=mysqli_connect("localhost","root","root","databasenew");
											//mysql_select_db("databasenew");
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$query = "SELECT * FROM item where item_id=".$item_id;
											if($result=mysqli_query($connect,$query)) {

                                            $row = mysqli_fetch_array($result);
								echo'<li><a href="cart.php?title='.$row['title'].'&price='.$row['price'].'&quantity=1&total='.$row['price'].'"><i class="fa fa-shopping-cart"></i> Cart</a></li>';
								}
								?>
								<li><a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock"></i> <?php 
					
					echo $email; 
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
								<li><a href="index.php">Home</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				
								<?php											
											$connect=mysqli_connect("localhost","root","root","databasenew");
											//mysql_select_db("databasenew");
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$query = "SELECT * FROM item where item_id=".$item_id;
											if($result=mysqli_query($connect,$query)) {

                                                $row = mysqli_fetch_array($result);
                                                $image = $row['cover_img'];
                                                echo '<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
												<img src="data:image/jpeg;base64,' . base64_encode($image) . '"  />
												</div>
										</div>
										<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>'.$row['title'].'</h2>
								<p>Author : '.$row['author'].'</p>
								<p>'.$row['ISBN'].'</p>
								<label> Rating : '.$row['istars'].'</label><br/>
								<span>
									<label>Price:'.$row['price'].'</label><br/>
									<label>Quantity: <form method="post"><input type="text" value=1 name="quantitySelected"></label>
						
									<button id="shoppingCart" onclick="addedToCart()" type="submit" class="btn btn-fefault cart">
									</form>
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									
									<script type="text/javascript">
									function addedToCart(){
									document.getElementById("shoppingCart").innerHTML="Added to Cart";
									}
									</script>
								</span>';
								$quantitySelected=$_POST['quantitySelected'];
								$queryRetrievalFromCustomer="SELECT * FROM customer where customer_email='$email'";
								if($customerIdResult=mysqli_query($connect,$queryRetrievalFromCustomer)){
									$customerRows=mysqli_fetch_array($customerIdResult);
									$customerId=$customerRows['customer_id'];
								
								$queryInsertion="INSERT INTO `cart_item` (`cquantity`,`item_id`,`customer_id`) VALUES ($quantitySelected,$item_id,$customerId)";
								mysqli_query($connect,$queryInsertion);
								
                                            }
											else{
												echo "Bad query";
												}
								}			
											?>
							</div>

						</div>
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php
									echo '<p><b> '.$row['customer_review'].'</b></p>
										<p><b>'.$row['editorial_review'].'</b></p>';
									?>
									<?php
									if (isset($_POST['submit'])) {
									  $feedback=$_POST['feedback'];
									  $rating=$_POST['rating'];
									  $connect=mysqli_connect("localhost","root","root","databasenew");
											//mysql_select_db("databasenew");
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$query = "INSERT INTO feedbacks (content,rating,item_id) VALUES ('$feedback','$rating','$item_id')";
											
											mysqli_query($connect, $query);
											$retrievalQuery = "Select content from feedbacks";
											if($result=mysqli_query($connect,$retrievalQuery)) {
											     while($row = mysqli_fetch_array($result)){									
												$feedbackContent[]=$row['content'];
												}
												foreach($feedbackContent as $feedback)
												echo $feedback.'<br/>';													
											}
											else{
											echo "Bad query";
											}
									  }
									?>
									<form action="" method="post">
										<strong> Feedback </strong>
										<textarea name="feedback" ></textarea>
										<b>Rating: </b> <input type="text" name="rating" /><br/><br/>
										<button name="submit" type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
					
<?php

											$connect=mysqli_connect("localhost","root","root","databasenew");
										
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$query = "SELECT * FROM item where category=some (select DISTINCT category from cart_item,item where cart_item.item_id = item.item_id)";
											if($result=mysqli_query($connect,$query)){
											
											$images = array();
											while ($row = mysqli_fetch_array($result)) {
												$images[] = $row['cover_img'];
												$titles[]=$row['title'];
												$prices[]=$row['price'];
												$items[]=$row['item_id'];
											}

											foreach ($images as $index => $image) {
												echo '<div class="col-sm-4">
													  <div class="product-image-wrapper">
													  <div class="single-products">
													  <div class="productinfo text-center">'.'<a href="product-details.php?item_id='.$items[$index].'"> <img src="data:image/jpeg;base64,'. base64_encode($image) .'" /> 
													  <h2>$'.$prices[$index].'</h2>'.
													  '<p>'.$titles[$index].'</p>'.
													  '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>'.'</div>
													  </div></div></div>';
											}
										}

										?>																
								</div>
								<div class="item">	
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						<!--</div> 
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">Sarah Wang</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>