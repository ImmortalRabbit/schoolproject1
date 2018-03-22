<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login.php</title>
<LINK REL=StyleSheet HREF="menu.css" TYPE="text/css">
</head>
<body>

<?php
$page_title = 'Register'; 
include ('header.html'); 
?>
 <ul id="menu">
 <li><a href="index.php">Register</a></li>
 <li><a href="Login.php">Login</a></li></ul>
<div id="center">

<!-- Creating various field to get user information -->
<form action="login.php" method="post">
<!-- I'm going to use simplest way of co-ordinating fields with text field, yes the tables! -->
    <table width="600px">
        <tr><td>Username</td><td><input type="text" name="username" required/></td></tr><!-- be careful here, name in the input field will be used as $_POST[$namevalue] while confirming registration -->
        <tr><td>Password</td><td><input type="password" name="password" required/></td></tr>
        <tr><td colspan="2"><font color="#FF0000" size="-1">
		<?php if(isset($error)) echo $error; ?></font></td></tr>
        <tr><td colspan="2"><input type="submit" name="sub" value="Login" /></td></tr>
    </table>
</form>
<?php
session_start(); // Starting sesssion
//Unsetting $error, that we'll use later to save error information
unset($error);
// Connecting to the mysql database
$host = "localhost"; // Mysql host name goes here
$hpass = "";// Mysql host password goes here
$huser = "root";// Mysql host username goes here

if(isset($_GET['id']))
{
echo "Welcome";
}

if(!mysql_connect($host,$huser,$hpass)) die("Unable to connect the database");
if(!mysql_select_db("onlyforyou")) die("Unable to connect the database");
//Defining post variables if defined.
if(isset($_POST['username']) || isset($_POST['password'])) // Means user have clicked the login button
{
     //Now I'm defining various variables
    $username = htmlspecialchars(mysql_real_escape_string($_POST['username'])); /* Mysql_real_escape_string helps to pervent sql injections*/
    $password = htmlspecialchars(mysql_real_escape_string(md5(sha1($_POST['password']))));/* md5 & sha1 is used to encrypt plain text into algorithm based special and secret characters, which can't be understood by normal person*/
  
    //Validating user input
    if($username == NULL || $username == "" || strlen($username) < 4)$error = "Invalid/Empty username field. Please enter your username with more than four characters.<br />";
    //Check if login information is correct or not
    $sql = "SELECT * FROM users WHERE username = '".$username."'"; /* means all rows from the table. Checking database for similar information.*/
    $result = mysql_query($sql); // Performed query
   	$boom = mysql_fetch_assoc($result);
	$pass = $boom['Pass_Word'];
    
	if(isset($_POST['sub']))
	{
			if($pass == $password)
			{
				setcookie("user",$boom['Username'],time()+3600);
				header('Location:homepage.php');
			}
			else
			{
				echo "Password is incorrect";
			}
		
	}
}
if(!isset($_SESSION['name'])){ // We cant allow the user who is already logged in, to login again.

    }
    else
    {
		$query=mysql_query("SELECT * FROM `users` WHERE `Username`='".$username."'");
		$boom=mysql_fetch_assoc($query);
		$id=$boom['User_id'];
		setcookie('id', $id, time() +60*60*24*30);
        echo"sadpaojd'kljd";
    }
	?>
    </div></body>
</html>