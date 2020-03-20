<?php
// session_start();

// initializing variables
// $username = "";
// $email    = "";
// $errors = array(); 

// connect to the database
// $db = mysqli_connect('localhost', 'root', '', 'webshop');
// include("_variables.php");
// $db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

// LOGIN USER
// if (isset($_POST['login_user'])) {
//     $username = mysqli_real_escape_string($db, $_POST['username']);
//     $password = mysqli_real_escape_string($db, $_POST['password']);
  
//     if (empty($username)) {
//         array_push($errors, "Gebruikersnaam is vereist");
//     }
//     if (empty($password)) {
//         array_push($errors, "Wachtwoord is vereist");
//     }
  
//     if (count($errors) == 0) {
//         $password = md5($password);
//         $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
//         $results = mysqli_query($db, $query);
//         if (mysqli_num_rows($results) == 1) {
//           $_SESSION['username'] = $username;
//           $_SESSION['success'] = "U bent ingelogd";
//           header('location: index.php');
//         }else {
//             array_push($errors, "Verkeerde gebruikersnaam/wachtwoord combinatie");
//         }
//     }
//   }
// ?>