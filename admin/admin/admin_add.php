<?php
    include("../../dashboard/navbar4.php");
    include("../../config/connect.php");
    include("admin_add_config.php");

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ADMIN toevoegen</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="post" action="admin_overview.php">
                    <div class="form-group">
                    <br>
                    <br>
                        <label for="fname">Naam</label>
                        <input type="text" name="field_firstname" id="fname"  class="form-control" placeholder="Voornaam" required />
                    </div>
                    <div class="form-group">
                        <label for="passwd">Wachtwoord</label>
                        <input type="password" name="field_password" class="form-control" id="passwd" placeholder="Wachtwoord" required />
                    </div>
                    <input type="submit" name="submit" class="btn btn-info" value="admin toevoegen" /><br>
                    <br>
                    <button class="btn btn-info "><a href="admin_overview.php" class="btn btn-default">back</a></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>