<?php

/**
 * Standaard functie definitie
 * @param string Dit noem je een parameter (die staat tussen haakjes)
 * @return array Dit is de waarde die je functie doorgeef
 */
function setFormData(){
    global $con; // dit is je database connectie

    if(isset($_POST['field_firstname']) && $_POST['field_firstname'] != ''){
        $firstName = dbp($_POST['field_firstname']);
    }else{
        echo "Voornaam is verplicht";
    }
    if(isset($_POST['field_password']) && $_POST['field_password'] != ''){
        $password = dbp($_POST['field_password']);
        $password = md5($password);
    }else{
        echo "Wachtwoord is verplicht";
    }
    

    $query1 = $con->prepare('INSERT INTO admin (username, password) VALUES (?, ?);');
    if ($query1 === false) {
        echo mysqli_error($con)." - ";
        exit(__LINE__);
    }
    $query1->bind_param('ss', $firstName,$password);
    if ($query1->execute() === false) {
        echo mysqli_error($con)." - ";
        exit(__LINE__);
    } else {
        echo "Gebruiker toegevoegd";
        $query1->close();
    }
}

// // LOGIN USER
// if (isset($_POST['login_user'])) {
//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
  
//     if (empty($username)) {
//         array_push($errors, "Gebruikersnaam is vereist");
//     }
//     if (empty($password)) {
//         array_push($errors, "Wachtwoord is vereist");
//     }
  
//     if (count($errors) == 0) {
//         $password = md5($password);
//         $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
//         $results = mysqli_query($con, $query);
//         if (mysqli_num_rows($results) == 1) {
//           $_SESSION['username'] = $username;
//           $_SESSION['success'] = "U bent ingelogd";
//           header('location: index.php');
//         }else {
//             array_push($errors, "Verkeerde gebruikersnaam/wachtwoord combinatie");
//         }
//     }
//   }

?>