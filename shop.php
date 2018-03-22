<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home page</title>
<meta name="description" content="Write some words to describe your html page">
<LINK REL=StyleSheet HREF="menu.css" TYPE="text/css">

</head>
<?php
include ('header.html');  ?>


<body>
 <ul id="menu">
 <li><a href="homepage.php">Home page</a></li>
 <li><div class="dropdown">
 <button onclick="myFunction()" class="dropbtn">Shop</button>

  <div id="myDropdown" class="dropdown-content">
    <a href="shop.php">Add to card</a>
    <a href="added.php">View card</a>
  </div>
  </div></li>
 <li><a href="gallery.php">Gallery</a></li>
 <li><a href="contacts.php">Contact with us</a></li>
 <li><a href="Logout.php">Logout</a></li>
 </ul>
<center>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<form method="post">
  <?php


  $conn = mysql_connect("localhost","root","");
    mysql_select_db("onlyforyou");



  $query1 = mysql_query("SELECT * FROM `products` ORDER BY ProductID DESC LIMIT 1");
	$boom=mysql_fetch_assoc($query1);
	$x = $boom['ProductID'];
	$x = $x +1;
	while($x>1)
	{
		$x = $x-1;
		$query = mysql_query("SELECT * FROM `products` WHERE `ProductID`='".$x."'");
		$boom = mysql_fetch_assoc($query);
		$query = mysql_query("SELECT * FROM `products` WHERE `ProductID`='".$x."'");
        $row = mysql_fetch_array($query);
		$name = $boom['Product_Name'];
		$cost = $boom['Cost'];
        echo '<h1>'.$name .'</h1>';
        echo '<img height="100" width="100" src="data:image;base64,'.$row[2].' ">'.'</br>';
        echo '<p1>'.$cost.'tng'.'</p1>'.'</br>';
		echo '<input name="'.$x.'" value="add" type="submit">';
		echo '<input name="'.$x.'1'.'" type="text">';
	}

	function update()
	{
  $query = mysql_query("SELECT * FROM `ordered_items` ORDER BY Order_itemID DESC LIMIT 1");
  $boom = mysql_fetch_assoc($query);
  $x = $boom['Order_itemID'];
  $x = $x +1;
  $total = 0;
  while($x>1)
  {
    $user=$_COOKIE['user'];
    $x = $x - 1;
    $query = mysql_query("SELECT * FROM `ordered_items` WHERE `Order_itemID`='".$x."' AND `Username` = '".$user."'");
    $boom = mysql_fetch_assoc($query);
    $price = $boom['Price'];
    $quan = $boom['Quantity'];
    $z = $price*$quan;
    $total = $total + $z;
    $query = mysql_query("UPDATE `orders` SET `TotalPrice`='".$total."' WHERE `Username` = '".$user."'");
  }
	}


	if(isset($_POST['1']))
	{
		$user=$_COOKIE['user'];
    $query = mysql_query("SELECT * FROM `products` WHEre `ProductID` = 1");
    $boom = mysql_fetch_assoc($query);
    $quantity = $_POST[11];
    $price = $boom['Cost'];
    $query = mysql_query("INSERT INTO `ordered_items`(`Username`,`ProductID`,`Quantity`,`Price`) Values('$user',1,'$quantity','$price')");
	update();

	}
  if(isset($_POST['2']))
  {
    $user=$_COOKIE['user'];
    $query = mysql_query("SELECT * FROM `products` WHEre `ProductID` = 2");
    $boom = mysql_fetch_assoc($query);
    $quantity = $_POST[21];
    $price = $boom['Cost'];
    $query = mysql_query("INSERT INTO `ordered_items`(`Username`,`ProductID`,`Quantity`,`Price`) Values('$user',2,'$quantity','$price')");
	update();
  }
  if(isset($_POST['3']))
  {
    $user=$_COOKIE['user'];
    $query = mysql_query("SELECT * FROM `products` WHEre `ProductID` = 3");
    $boom = mysql_fetch_assoc($query);
    $quantity = $_POST[31];
    $price = $boom['Cost'];
    $query = mysql_query("INSERT INTO `ordered_items`(`Username`,`ProductID`,`Quantity`,`Price`) Values('$user',3,'$quantity','$price')");
	update();
  }
  if(isset($_POST['4']))
  {
    $user=$_COOKIE['user'];
    $query = mysql_query("SELECT * FROM `products` WHEre `ProductID` = 4");
    $boom = mysql_fetch_assoc($query);
    $quantity = $_POST[41];
    $price = $boom['Cost'];
    $query = mysql_query("INSERT INTO `ordered_items`(`Username`,`ProductID`,`Quantity`,`Price`) Values('$user',4,'$quantity','$price')");
	update();
  }


	include('fotter.html');

  ?>

   </form>
    <br /> <br /> <br />

  </center>
</body>
</html>
