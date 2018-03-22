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
<table>
<tr> <td> &nbsp;&nbsp;Product name&nbsp;&nbsp; </td> <td> &nbsp;&nbsp;quantity&nbsp;&nbsp; </td> <td> &nbsp;&nbsp;price &nbsp;&nbsp;</td> <td> &nbsp;&nbsp;delete&nbsp;&nbsp; </td> </tr>
<?php
$conn = mysql_connect("localhost","root","");
    mysql_select_db("onlyforyou");
	$query = mysql_query("SELECT * FROM `ordered_items` ORDER BY Order_itemID DESC LIMIT 1");
	$boom = mysql_fetch_assoc($query);
	$o = $boom['Order_itemID'];
	$o = $o + 1;
  	while($o>1)
	{
		$o = $o - 1;
		$query = mysql_query("SELECT * FROM `ordered_items` WHERE `Order_itemID`='".$o."' AND `Username`='".$_COOKIE['user']."'");
		$boom = mysql_fetch_assoc($query);
		$query1 = mysql_query("SELECT * FROM `products` WHERE `ProductID`='".$boom['ProductID']."'");
		$boom1 = mysql_fetch_assoc($query1);
		$row = mysql_num_rows($query1);
		if($row>0)
		{
		echo '<tr> <td>&nbsp;&nbsp;'.$boom1['Product_Name'].'&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;'.$boom['Quantity'].'</td> <td> &nbsp;&nbsp;'.$boom1['Cost'].'</td> <td> &nbsp;&nbsp;&nbsp;  <input type="submit" name="'.$boom['Order_itemID'].'" value="x"></td> <tr>';
		}
	}
	$query2 = mysql_query("SELECT * FROM `orders` WHERE `Username`='".$_COOKIE['user']."'");
	$boom2 = mysql_fetch_assoc($query2);
	echo '<br /> <br /><tr> <td>'.'&nbsp;&nbsp;Total price:</td><td>&nbsp;&nbsp;'.$boom2['TotalPrice'].'tenge &nbsp;&nbsp;</td> <td> </td> <td> </td> <tr>';

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
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='1' limit 1") or mysql_error();
	       update();
			header('Location:added.php');

		}
		if(isset($_POST['2']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='2' limit 1") or mysql_error();
      update();
			header('Location:added.php');
		}
		if(isset($_POST['3']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='3' limit 1") or mysql_error();
			update();
			header('Location:added.php');
		}
		if(isset($_POST['4']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='4' limit 1") or mysql_error();
	     update();
			header('Location:added.php');
		}
		if(isset($_POST['5']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='5' limit 1") or mysql_error();
			update();
			header('Location:added.php');
		}
		if(isset($_POST['6']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='6' limit 1") or mysql_error();
		update();
			header('Location:added.php');
		}
		if(isset($_POST['7']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='7' limit 1") or mysql_error();
			update();
			header('Location:added.php');
		}
		if(isset($_POST['8']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='8' limit 1") or mysql_error();
			update();
			header('Location:added.php');
		}
		if(isset($_POST['9']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='9' limit 1") or mysql_error();

		update();
			header('Location:added.php');
		}
		if(isset($_POST['10']))
		{
			$query = mysql_query("DELETE FROM `ordered_items` WHERE `Order_itemID`='10' limit 1") or mysql_error();
	update();
			header('Location:added.php');
		}

		include('fotter.html');
?>
<style>
table {
    border-collapse: collapse;
}

table, tr, td {
    border: 1px solid black;
}

</style>
</form>
</table>
</form>
</center>
</body>
</html>
