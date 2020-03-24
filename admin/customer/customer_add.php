<?php
include("../../dashboard/navbar3.php");
require_once "../../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['gender']) && isset($_POST['firstname']) && isset($_POST['middlename'])) {
        $sql = "INSERT INTO customer (gender, firstname, middlename, lastname, street, housenumber, housenumber_addon, zipcode, city, phone, `e-mailadres`, password, newsletter_subscription) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("issssissssssi", $_POST['gender'], $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['street'], $_POST['housenumber'], $_POST['housenumber_addon'], $_POST['zipcode'], $_POST['city'], $_POST['phone'], $_POST['e-mailadres'], $_POST['password'], $_POST['newsletter_subscription']);
            if ($stmt->execute()) {
                header("location: ../index.php");
                exit();
            } else {
                echo "Error! Please try again later.";
            }
            $stmt->close();
        }
    }
    $link->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create Users</h2>
                </div>
                <p>Fill this form to add users to the database.</p>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="form-group">
                        <label>gender</label>
                        <input type="number" name="gender" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>firstname</label>
                        <input type="text" name="firstname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>middlename</label>
                        <input type="text" name="middlename" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>lastname</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>street</label>
                        <input type="text" name="street" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>housenumber</label>
                        <input type="number" name="housenumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>housenumber_addon</label>
                        <input type="text" name="housenumber_addon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>zipcode</label>
                        <input type="text" name="zipcode" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>city</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>e-mailadres</label>
                        <input type="text" name="e-mailadres" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="passwd">password</label>
                        <input type="password" name="password" class="form-control" id="passwd" placeholder="password" required />
                    </div>
                    <div class="form-group">
                        <label>newsletter_subscription</label>
                        <input type="number" name="newsletter_subscription" class="form-control" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>