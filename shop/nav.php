
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="assets/css/nav2.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a id="right" href="admin/login.php">ADMIN</a>
  <div id="right"><a href="#">
  <?php 
  // session_start(); // nodig om sessie te bewaren
  if (isset($_SESSION['mail'])) { // kijkt of sessie bestaat
    echo "<a href='logout.php'> Welkom " . $_SESSION['mail']; // als sessie bestaat, dan heet gebruiker welkom
  } else {
    echo "<a href='userlogin.php'>Log in</a>"; // als sessie niet bestaat, dan toon login link
  }

 ?>
 !</a></div>
<div class="link-icons" id="right"><a href="#">                
  <a href="shopping.php">
  <i class="fas fa-shopping-cart"></i>
</a>
</div>

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