
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/nav2.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="products.php">product CRUD</a>
  <div id="right"><a href="#">
  <?php 
  session_start(); // nodig om sessie te bewaren
  if (isset($_SESSION['firstname'])) { // kijkt of sessie bestaat
    echo "<a href='logout.php'> Welkom " . $_SESSION['firstname']; // als sessie bestaat, dan heet gebruiker welkom
  } else {
    echo "<a href='userlogin.php'>Log in</a>"; // als sessie niet bestaat, dan toon login link
  }

 ?>
 !</a></div>
  <!-- <div id="right"><a href="userlogin.php">Login</a></div> -->
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