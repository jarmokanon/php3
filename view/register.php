<?php
    include("../config/connect.php");
    include("../src/register.php");

    //dd($_POST);

    if(!empty($_POST)){
        $sfd = setFormData();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style3.css" />
    <title>CMS registratie</title>
</head>
<body>
    <div class="form">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="post" action="register.php">
                    <div class="form-group">
                        <input type="text" name="field_firstname" id="fname"  class="form-control" placeholder="Voornaam" required />
                        <input type="text" name="field_infixname" class="form-control" placeholder="Tussenvoegsel" />
                        <input type="text" name="field_lastname" class="form-control" placeholder="Achternaam" required />
                    </div>
                    <div class="form-group">
                        <input type="email" name="field_mail" class="form-control" id="email" placeholder="E-mailadres" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="field_password" class="form-control" id="passwd" placeholder="Wachtwoord" required />
                    </div>
                    <input type="submit" name="submit" class="btn btn-info" value="Registreren" />
                </form>
            </div>
        </div>
    </div>
</body>
</html>