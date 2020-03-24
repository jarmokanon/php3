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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Producten overzicht</h2><br><br><br>
                        <p class="pull-left">hier zie je het volledige product overzicht met afbeeldingen erbij</p>
                    </div>
                    <?php
                    // Include config file
                    require_once "../config/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT product.id, product.name, product.description, product.price, product.color, product.weight, category.name AS category, product_image.image FROM `product` INNER JOIN product_image ON product.id = product_image.product_id INNER JOIN category ON product.category_id = category.id GROUP BY product.id";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>price</th>";
                                        echo "<th>color</th>";
                                        echo "<th>weight</th>";
                                        echo "<th>category</th>";
                                        echo "<th>image</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "<td>" . $row['color'] . "</td>";
                                        echo "<td>" . $row['weight'] . "</td>";
                                        echo "<td>" . $row['category'] . "</td>";
                                        echo "<td>" . $row['image'] . "</td>";
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