<?php

require("../dashboard/navbar.php");
require_once "../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['image']) && isset($_POST['active'])) {
        $sql = "INSERT INTO product_image (product_id, image, active) VALUES (?,?,?)";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("isi", $_POST['product_id'], $_POST['image'], $_POST['active']);
            if ($stmt->execute()) {
                header("location: product_image.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
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
                        <label>product id</label>
                        <input type="number" name="product_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="text" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>active</label>
                        <input type="number" name="active" class="form-control" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="products.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>