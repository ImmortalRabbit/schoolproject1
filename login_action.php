<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login_Action</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
require('connect.php');
require('login_tools.php');
list ($check, $data)= validate ($dbc, $_POST['Username'], $_POST['Pass_word']);
if ($check)
{
session_start(); 
$_SESSION['Username']=$data['Username'];
$_SESSION['First_Name']=$data['First_Name'];
$_SESSION['Last_name']=$data['Last_name'];
load('index.php');
}
else {$errors=$data; }
mysqli_close($dbc);
include('login.php');
} ?>
<body>
</body>
</html>
