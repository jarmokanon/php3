<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="../assets/css/style2.css" />
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<body>
<style>
.wrapper {
    width: 95%;
    margin: 0 auto;
}
</style>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Customer overzicht</h2><br><br><br>
                        <p class="pull-left">Alle customers.</p>
                    </div>
                    <?php
                    // Include config file
                    require_once "../config/config4.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `customer`";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>id</th>";
                                    echo "<th>Gender</th>";
                                    echo "<th>Firstname</th>";
                                    echo "<th>Middlename</th>";
                                    echo "<th>Lastname</th>";
                                    echo "<th>Street</th>";
                                    echo "<th>Housenumber</th>";
                                    // echo "<th>Housenumber_addon</th>";
                                    echo "<th>Zipcode</th>";
                                    echo "<th>City</th>";
                                    echo "<th>Phone</th>";
                                    echo "<th>E-mailadres</th>";
                                    echo "<th>Password</th>";
                                    echo "<th>Newsletter_subscription</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['gender'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['middlename'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['street'] . "</td>";
                                    echo "<td>" . $row['housenumber'] . "</td>";
                                    // echo "<td>" . $row['housenumber_addon'] . "</td>";
                                    echo "<td>" . $row['zipcode'] . "</td>";
                                    echo "<td>" . $row['city'] . "</td>";
                                    echo "<td>" . $row['phone'] . "</td>";
                                    echo "<td>" . $row['e-mailadres'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>" . $row['newsletter_subscription'] . "</td>";
                                    echo "<td>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
</div>
</body>
</html>