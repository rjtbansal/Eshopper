<?php
session_start(); //passing our user info
$email=$_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
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
								<li><a href="checkout.php" class="active"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock"></i> <?php 				
												echo $email; 
												?> 
					<strong class="caret"></strong>
					<ul class="dropdown-menu">
					<li>
					<a href="index.php"><span class="glyphicon glyphicon-off"></span> Sign out</a>
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

	<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Your Shipping Information</p>
							<?php
								$connect=mysqli_connect("localhost","root","root","databasenew");
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
											$query = "SELECT customer.customer_firstname,customer.customer_lastname, customer.address FROM customer,cart_item WHERE cart_item.customer_id = customer.customer_id ";
											if($result=mysqli_query($connect,$query)) {

                                                $row = mysqli_fetch_array($result);
												$firstname=$row['customer_firstname'];
												$lastname=$row['customer_lastname'];
												$address=$row['address'];
												echo $firstname.'  '.$lastname.'<br/>'.$address;
											}							
											
							?>
							
							
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Payment Information on File</p>
							<div class="form-one">
								<?php
								$connect=mysqli_connect("localhost","root","root","databasenew");
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
					$query = "SELECT credit_card.name_on_card,credit_card.card_number,credit_card.bill_add,credit_card.bill_phone FROM credit_card,cart_item WHERE cart_item.customer_id = credit_card.customer_id  ";
					
											if($result=mysqli_query($connect,$query)) {

                                                $row = mysqli_fetch_array($result);
												$nameOnCard=$row['name_on_card'];
												$cardNumber=$row['card_number'];
												$billAddr=$row['bill_add'];
												$billPhone=$row['bill_phone'];
												echo 'Name on Card: '.$nameOnCard.'</br> Card Number(last 4 digits)'.$cardNumber.'<br/>Bill Address:'.$billAddr.'<br/>Phone: '.$billPhone;
											}
											
											
							?>
							</div>
							<div class="form-two">
								<!--<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form> -->
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<?php
									$connect=mysqli_connect("localhost","root","root","databasenew");
									
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
											
					$query = "SELECT item.title, cart_item.customer_id, cart_item.cquantity, cart_item.item_id, item.price FROM cart_item, item WHERE cart_item.item_id = item.item_id";
					
											if($result=mysqli_query($connect,$query)) {

                                while($row = mysqli_fetch_array($result)){
									$titles[] = $row['title'];
									$quantity[]=$row['cquantity'];
									$price[]=$row['price'];
									$customerId=$row['customer_id'];
									$itemId=$row['item_id'];
									
								}
								
							foreach($titles as $index => $title){	
							   $totalPriceArray[]=$price[$index]*$quantity[$index];
							   
								echo'<tr><td class="cart_description">
								<h4><a href="">'.$title.'</a></h4>
							</td>
							
							<td class="cart_price">
								<p>'.$price[$index].'</p>
							</td>
							</td>
							<td class="cart_quantity">
								'.$quantity[$index].'
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.($price[$index]*$quantity[$index]).'</p>
							</td></tr>';
							$purchaseDate=date("Y-m-d");
							$queryInsertion="INSERT INTO c_purchase (customer_id,item_id,cquantity,p_date) VALUES ('$customerId','$itemId','$quantity[$index]','$purchaseDate');";
							if($result=mysqli_query($connect,$queryInsertion)){
							
							}
							else
							{
							echo "Could not insert into c_purchase table";
							}
							
							}
							
							
							
							
						}
											
											
							?>
							</td>
							
							
						</tr>

						
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><?php echo array_sum($totalPriceArray) ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					
					<a class="btn btn-primary" href="confirmation.php" onclick="dropCart()">Confirm</a>
					
					<script type="text/javascript">
						function dropCart(){						
							
							<?php						
								$connect=mysqli_connect("localhost","root","root","databasenew");
									
											if (mysqli_connect_error()) {
												die("Could not connect to database");
											}
								$todayDate = date("Y-m-d");
								$deleteQuery="DELETE FROM cart_item";
								$transactionQuery="start TRANSACTION;
													select order_id from c_purchase WHERE order_id = 9;
													update c_purchase SET ship_id = 1;
													select ship_id from shipping WHERE ship_id = 1;
													update shipping SET arrival_time = 3 + delivery_time;
													COMMIT;";
								
								mysqli_query($connect,$deleteQuery);	
								if($transactionResult=mysqli_query($connect, $transactionQuery)){
									echo "query executed successfully";
								}
								else{
									echo "bad query";
								}	
							?>
						}
					</script>
				</div>
				
				
		</div>
	</section> <!--/#cart_items-->

	

	<footer id="footer"><!--Footer-->		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Sarah Wang</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>