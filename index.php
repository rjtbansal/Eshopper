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
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i>User Login</a></li>
                                <li><a href="managerLogin.html"><i class="fa fa-lock"></i>Manager Login</a></li>
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
								<li><a href="index.html" class="active">Home</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form  method="post" action="index.php?go"  id="searchform">
							<input type="text" name="queryName" placeholder="Search"/>
							<input type="submit" name="submit" style="color:black" value="Submit" class="btn btn-primary">
							</form>
							<?php
								if(isset($_POST['submit'])){ 
								
	  							if(isset($_GET['go'])){ 	  								
								if(preg_match("/^[\w]+$/", $_POST['queryName'])){ 
	   							$name=$_POST['queryName']; 
								$connect=mysqli_connect("localhost","root","root","databasenew");
									if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
								$query="select cover_img,ISBN,title, author, price from item USE INDEX (index1) where author like '%$name%'
								OR ISBN LIKE '%$name%' OR title like '%$name%'";
								//echo $query;
								if($result=mysqli_query($connect,$query)){
									
									while($row=mysqli_fetch_array($result)){
									$images[]=$row['cover_img'];
									$isbn[]=$row['ISBN'];
									$titles[]=$row['title'];
									$author[]=$row['author'];
									$price[]=$row['price'];
									}
									
									foreach($images as $index => $image){
									
									echo '<img src="data:image/jpeg;base64,'. base64_encode($image) .'" />'.$isbn[$index].'<br/>'.$titles[$index] . '<br/>'. $author[$index] . '<br/>'.$price[$index] . '<br/><br/>' ;
									}
								}
								else{
									echo "bad query";
								}

								
									}
									
								}
	  							else{ 
	  							echo  "<p>Please enter a search query</p>"; 
	  							} 
								}
								
							?>
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
						<h2 class="title text-center">Featured Items</h2>
						<?php

											$connect=mysqli_connect("localhost","root","root","databasenew");
										
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$query = "SELECT * FROM item";
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
													  '<p>'.$titles[$index].'</p></div>
													  </div></div></div>';
											}
										}

										?>
						
					</div><!--features_items-->
					
					<!--<div class="recommended_items"><!--recommended_items--
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
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