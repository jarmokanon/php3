<?php
  // include("../config/config.php");
  include("../../config/auth.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../assets/css/nav.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="../index.php" class="active">dashboard</a>
  <a href="../product/products.php">product CRUD</a>
  <a href="../product/product_image.php">product_image CRUD</a>
  <a href="../customer/customer_overview.php">customer CRUD</a>
  <a href="../admin/admin_overview.php">admin CRUD</a>
  <a href="category_overview.php">category CRUD</a>  
  <div id="right"><a href="#about">Welcome <?php echo $_SESSION['username']; ?>!</a></div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>