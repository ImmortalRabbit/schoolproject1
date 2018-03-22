
<html>
<head>

  <meta charset="utf-8">

</head>
<body>

<form method="post" enctype="multipart/form-data">
  <input type="text" name="title" ><br>
  <input type="file" name="image"/> </br>
  <input type="text" name="cost" ><br>
  <input type="submit" name="add" value="add">
</form>

  <?php


  $conn = mysql_connect("localhost","root","");
    mysql_select_db("onlyforyou");

      if(isset($_POST['add']))
      {
        $title = $_POST['title'];
        $cost = $_POST['cost'];


   if(getimagesize($_FILES['image']['tmp_name']) == TRUE)
     	{
        $image = addslashes($_FILES['image']['tmp_name']);
        $name = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
    	$query = mysql_query("INSERT INTO `products`(`Product_Name`,`Product_image`,`Cost`) VALUES('$title','$image','$cost')") or mysql_error();
          }

      }


  ?>
  
  

    
 

</body>
</html>
