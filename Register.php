<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<LINK REL=StyleSheet HREF="menu.css" TYPE="text/css">

</head>

<body>
<?php
$page_title = 'Register';
?>

 <ul id="menu">
 <li><a href="Register.php">Register</a></li>
 <li><a href="Login.php">Login</a></li></ul>


<form action="Register.php" method="post">
<!-- I'm going to use simplest way of co-ordinating fields with text field, yes the tables! -->
<table>
  <tr>
    <td><p1>Username</p1></td>
    <td><input type="text" name="Username" pattern='[0-9]{1,6}' title='123456; Input only numbers' placeholder="Create your username" required/></td>
  </tr>
  <tr>
    <td><p1>First name</p1></td>
    <td><input type="text" name="First_Name" placeholder="Type your first name" required/></td>
  </tr>
  <tr>
    <td><p1>Last name</p1></td>
    <td><input type="text" name="Last_Name" placeholder="Type your last name" required/></td>
  </tr>
  <!-- be careful here, name in the input field will be used as $_POST[$namevalue] while confirming registration -->
  <tr>
    <td><p1>Email address</p1></td>
    <td><input type="email" name="Email" placeholder="Type your email address" required/></td>
  </tr>
  <tr>
    <td><p1>Password</p1></td>
    <td><input type="password" name="Pass_word" placeholder="Create password" required/></td>
  </tr>
  <tr>
    <td><p1>Confirm password</p1></td>
    <td><input type="password" name="confirmpassword" placeholder="Confirm password" required/></td>
  </tr>
  <tr>
    <td><p1>Telephone</p1></td>
    <td><input type='tel' name="Telephone"  placeholder="Type your phone number" required/></td>
  </tr>
  <tr>
    <td colspan="2"><!-- Registration error if happens --></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" value="Submit" /></td>
  </tr>
</table>
</form> </h3>

<?php
$host = "localhost"; // Mysql host name goes here
$hpass = "";// Mysql host password goes here
$huser = "root";// Mysql host username goes here
$db="onlyforyou";
if(!mysql_connect($host, $huser, $hpass, $db)) die("Unable to connect the database");
if(!mysql_select_db("onlyforyou")) die("Unable to connect the database");
//Defining post variables if defined.

if(isset($_POST['submit']))
{
  $Username = $_POST['Username'];
  $First_Name = $_POST['First_Name']; /* Mysql_real_escape_string helps to pervent sql injections*/
  $Last_Name = $_POST['Last_Name'];
  $Email = $_POST['Email'];
  $Pass_word = md5(sha1($_POST['Pass_word']));/* md5 & sha1 is used to encrypt plain text into algorithm based special and secret characters, which can't be understood by normal person*/
  $confirmpassword = md5(sha1($_POST['confirmpassword']));
  $Telephone = $_POST['Telephone'];

  if($Pass_word==$confirmpassword)
  {
    $sql = "SELECT * FROM users WHERE username = '".$Username."'"; /* means all rows from the table.*/
    $result = mysql_query($sql); // Performed query
    if(mysql_num_rows($result) > 0) // There is a result, means username already exists.
    {
          echo "Username already exists!";
    }

    else
    {
        if (!preg_match("/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i",$Email))
        {
          echo "Email format is incorrect";
        }
        else
        {
              if (!preg_match("^[0-9\+\-\(\)\s]+$^",$Telephone))
              {
                echo "Telephone format is incorrect";
              }
              else
              {
                $sql = "INSERT INTO `users`(`Username`,`First_Name`, `Last_Name`,`Pass_word`, `Email`,`Telephone`) VALUES ('$Username','$First_Name','$Last_Name','$Pass_word','$Email', '$Telephone')";/* SQL command to insert into database*/
                    if(mysql_query($sql)) // Perform query
                    {
                        echo '<p4>'."Your account is registered successfully!, please <a href='Login.php'>Login</a> to proceed".
                        $query = mysql_query("INSERT INTO `orders`(`Username`) VALUES('$Username')");
                        
						'</p4>';
                    }
                    else
                    {
                        die("Unable to create user account ".mysql_error());
                    }

              }

        }
    }
  }
  else
  {
    echo "Your passwords did not match each other";
  }

}



?>
</body>
</html>
