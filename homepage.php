<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home page</title>
<meta name="description" content="Write some words to describe your html page">
<LINK REL=StyleSheet HREF="menu.css" TYPE="text/css">

</head>

<body>


 <?php
 include ('header.html');
 ?>

<div>
<div1> <h1>Money back guarantee </h1></div1>
<div2> <h1>Order easily</h1></div2>
<div3> <h1>Sales 10% OFF</h1></div3>
</div>


<style>
#Deadpool
{
  left:-20px;
  top:250px;
  z-index:auto;
}
#asd
{
 position:absolute;
 left:600px;
 top:200px;
 z-index:auto;
}
</style>

<div id="Deadpool">
<?php
include ('fotter.html');
 ?>

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
<div id="asd">
<?php
include ('gallery.htm');
?>
</div>
<ul id="menu" style=" z-index:4;">
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


</div>
</body>
</html>
