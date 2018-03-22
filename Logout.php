<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logout</title>
</head>

<body>
<?php	


	echo '<h1> Goodbye!</h1>
	<p>You are now logged out. </p>
	<p><a href="login.php">Login</a></p>';
	setcookie("user",$_COOKIE['user'],time()-3600);
	
?>

</body>
</html>
