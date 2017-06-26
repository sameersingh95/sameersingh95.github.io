<?php
define('DB_HOST','localhost');
define('DB_NAME','wikivellore');
define('DB_USER','root');
define('DB_PASSWORD','');
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db=mysql_select_db(DB_NAME,$con);
function SignIn()
{
session_start();
if(!empty($_POST['user']))
{
	$query = mysql_query("SELECT * FROM users WHERE email = '".$_POST['email']."' && password = '".sha1($_POST['pass'])."'");
	$query2 = mysql_query("SELECT first_name, last_name FROM users WHERE username = '".$_POST['user']."' && password = '".sha1($_POST['pass'])."'");
	$row = mysql_fetch_array($query);
	$row2 = mysql_fetch_array($query2);
	if(!empty($row['username']) AND !empty($row['password']))
	{
			session_start();
			$_SESSION["signin"]=1;
			$_SESSION['username']=$_POST['user'];
			$_SESSION['firstname']=$row2['first_name'];
		echo("<meta http-equiv=\"refresh\" content=\"0;URL='Home.php'\">");

	}
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
		echo("<meta http-equiv=\"refresh\" content=\"0;URL='login.html'\">");
	}
}
}
if(isset($_POST['submit']))
{
	SignIn();
}
?>