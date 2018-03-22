
<html>
<head>

  <meta charset="utf-8">

</head>
<body>

<form method="post">
  <input type="text" name="login" >
  <input type="password" name="password" >
  <input type="submit" name="login" value="login" >
</form>

  <?php

  if(isset($_POST['login']))
  {
    if($_POST['login']='admin123')
    {
      if ($_POST['password']='admin123')
      {
          header("Location:addproducts.php");
          exit();
      }
      else {
        echo "wrong password or login";
      }
    }
    else
    {
    echo "wrong password or login";
    }
  }

  ?>

</body>
</html>
