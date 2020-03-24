<?php

require("../../dashboard/navbar.php");
require_once "../../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['category_id'])) {
        $sql = "INSERT INTO product (name, description, category_id, price, color, weight, active) VALUES (?,?,?,?,?,?,?)";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("ssiisii", $_POST['name'], $_POST['description'], $_POST['category_id'], $_POST['price'], $_POST['color'], $_POST['weight'], $_POST['active']);
            if ($stmt->execute()) {
                header("location: products.php");
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
                    <h2>Create product</h2>
                </div>
                <p>Maak hier een nieuw product aan. voeg daarna een foto toe met de product_id van het product zodat ze bij elkaar komen.</p>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>category_id</label>
                        <input type="number" name="category_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>color</label>
                        <input type="text" name="color" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>weight</label>
                        <input type="number" name="weight" class="form-control" required>
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