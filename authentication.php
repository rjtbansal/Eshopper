<?php
  $email=$_POST['email'];
  $password=$_POST['password'];

if ($email&&$password) 
{
	//connect to db
	$connect = mysql_connect("localhost","root","root") or die("not connecting");
	mysql_select_db("databasenew") or die("no db :'(");
	$query = mysql_query("SELECT * FROM customer WHERE customer_email='$email'");
	$numrows = mysql_num_rows($query);

	if ($numrows!=0)
	{
	//while loop
	while ($row = mysql_fetch_assoc($query))
	{
		$dbusername = $row['customer_email'];
		$dbpassword = $row['password'];
		
		//redirecting to main page
		header('Location: loggedIn.php');
		session_start();
		$_SESSION['email'] = $email;
    }
  
    echo '<script type="text/javascript"> alert("Incorrect login info! Please re-enter"); window.location.replace("login.html")</script>';
}
else
	echo '<script type="text/javascript"> alert("Incorrect login info! Please re-enter"); window.location.replace("login.html")</script>';
} 
else
    echo '<script type="text/javascript"> alert("Incorrect login info! Please re-enter"); window.location.replace("login.html")</script>';
  
?>