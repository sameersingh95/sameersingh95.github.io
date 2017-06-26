<?php
define('DB_HOST','localhost');
define('DB_NAME','tutorials');
define('DB_USER','root');
define('DB_PASSWORD','');
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db=mysql_select_db(DB_NAME,$con);
function NewUser() {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['user'];
	$password = sha1($_POST['pass']);
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$query = "INSERT INTO users (name,user,password,dob,mobile,email) VALUES ('$name','$username','$password','$dob','$mobile','$email')";
	$data = mysql_query($query);
	if($data)
	{
		echo 'User Registered';
		session_start();
		$_SESSION["signin"]=1;
		echo("<meta http-equiv=\"refresh\" content=\"0;URL='base.html'\">");
	}
}
function SignUp()
{
		$query = mysql_query("SELECT * FROM users WHERE user = '$_POST[user]'");
		$query2 = mysql_query("SELECT * FROM users WHERE email = '$_POST[email]'");
		if(empty($row = mysql_fetch_array($query)) && empty($row = mysql_fetch_array($query2)))
		{
			NewUser();
		}
		else if(!empty($row = mysql_fetch_array($query))) 
		{
			echo "Sorry, username already taken";
		}
		else if(!empty($row = mysql_fetch_array($query2)))
		{
			echo "Account for the email id already exists";
		}
	
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>