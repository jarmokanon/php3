<?php
       session_start();
?>
<?php
include("../../dashboard/navbar5.php");
require_once "../../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['active'])) {
        $sql = "INSERT INTO category (name, description, active) VALUES (?,?,?)";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("ssi", $_POST['name'], $_POST['description'], $_POST['active']);
            if ($stmt->execute()) {
                echo "<script>window.location.href='../index.php'</script>";
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
                    <h2>Create category</h2>
                </div>
                <p>Fill this form to add a category to the database</p>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>active</label>
                        <input type="number" name="active" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="category_overview.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>