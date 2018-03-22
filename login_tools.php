<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Tools</title>
</head>
<?php 
function load($page='login.php') 
{

$url='http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);
$url =rtrim($url , '^\\'); 
$url.= '/'. $page; 
header("Location:$url");
exit(); 
}
function validate($dbc, $email = '', $pwd = '')

{

$errors = array();  

if(empty($email))
{$errors[]='Enter your email address';}
else
{$e=mysqli_real_escape_string($dbc, trim($email));}

if (empty($pwd))
{$errors[]='Enter your password';}
else
{$p=mysqli_real_escape_string($dbc, trim($pwd));}

if(empty($errors))
{
$q="SELECT Username, First_Name, Last_name FROM users WHERE Email='$e' AND Pass_word=SHA1('$p')";
$r=mysqli_query($dbc, $q);

if (mysqli_num_rows($r)==1)
{
$row=mysqli_fetch_array($r, MYSQLI_ASSOC);
return array(true, $roq);
}
else
{$errors[]='Email address and password not found';}
}
return array(false, $errors);
} 
?>

<body>
</body>
</html>
