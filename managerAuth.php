<?php
  $managerId=$_POST['managerId'];
  $password=$_POST['password'];

  if ($managerId&&$password) 
{
//connect to db
$connect = mysql_connect("localhost","root","root") or die("not connecting");
mysql_select_db("databasenew") or die("no db :'(");
$query = mysql_query("SELECT * FROM manager WHERE mgr_id='$managerId'");

$numrows = mysql_num_rows($query);


if ($numrows!=0)
{
//while loop
  while ($row = mysql_fetch_assoc($query))
  {
    $dbusername = $row['mgr_id'];
    $dbpassword = $row['password'];
	//redirecting to main page
	header('Location: managerLoggedIn.php');
	session_start();
    $_SESSION['mgr_id'] = $managerId;
  }
  
  echo '<script type="text/javascript">alert("Incorrect login info! Please re-enter"); window.location.replace("managerLogin.html")</script>';
}
else
  echo '<script type="text/javascript">alert("Incorrect login info! Please re-enter"); window.location.replace("managerLogin.html")</script>';
} 
else
    echo '<script type="text/javascript">alert("Incorrect login info! Please re-enter"); window.location.replace("managerLogin.html")</script>';
  
?>