<?php
       session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="assets/css/style3.css" />
</head>
<body>
<?php
require('config/db.php');
// If form submitted, insert values into the database.
if (isset($_POST['mail'])){
        // removes backslashes
 $mail = stripslashes($_REQUEST['mail']);
        //escapes special characters in a string
 $mail = mysqli_real_escape_string($con,$mail);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE mail='$mail'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['mail'] = $mail;
            // Redirect user to index.php
     echo "<script>window.location.href='index.php'</script>";
         }else{
 echo "<div class='form'>
<h3>mail/password is incorrect.</h3>
<br/>Click here to <a href='userlogin.php'>Login</a></div>";
 }
    }else{
?>
<div class="form">
<form action="" method="post" name="login">
<input type="text" name="mail" placeholder="mail" required />
<input type="password" name="password" placeholder="password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='view/register.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>

