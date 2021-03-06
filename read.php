<?php
       session_start();
?>
<?php
    include("shop/nav.php");
    require 'config/database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT product.id AS product_id, product.name, product.description, product.price, product.color, product.weight, category.name AS category, product_image.image FROM `product` INNER JOIN product_image ON product.id = product_image.product_id INNER JOIN category ON product.category_id = category.id WHERE category.id = $id GROUP BY product.id";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<?php
    $database_name = "u532747_webshop";
    $con = mysqli_connect("localhost","u532747_webshop","Wordpress1",$database_name);
 
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["product_id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["product_id"],
                    'item_name' => $_POST["name"],
                    'product_price' => $_POST["price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="shopping.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="shopping.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["product_id"],
                'item_name' => $_POST["name"],
                'product_price' => $_POST["price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
 
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["product_id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="shopping.php"</script>';
                }
            }
        }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="assets/css/read.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
</head>
<header class="header"></header>

<body>
<div id="container">
    <div class="container">
            <div class="row">

        <?php
            $query = "SELECT product.id AS product_id, product.name, product.description, product.price, product.color, product.weight, category.name AS category, product_image.image FROM `product` INNER JOIN product_image ON product.id = product_image.product_id INNER JOIN category ON product.category_id = category.id WHERE category.id = $id GROUP BY product.id ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {
 
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-md-3">
 
                    <?php echo "<form method='post' action='shopping.php?action=add&id=" . $data["product_id"]."'>";?>
                     
                            <div class="card">
                                <?php echo "<img class='img-responsive' src='admin/product/".$data['image']."' >";?>
                                <h5 class="text-info"><?php echo $data["name"]; ?></h5>
                                <h5 class="price" class="text-danger"><?php echo $data["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="name" value="<?php echo $data["name"]; ?>">
                                <input type="hidden" name="price" value="<?php echo $data["price"]; ?>">
                                <input type="hidden" name="id" value="<?php echo $data["product_id"]; ?>"><br>
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                                <hr>
                                <?php echo '<a class="btn" href="productpage.php?id='.$data['product_id'].'">Bekijk</a>'; ?>
                            </div>
                        </form>
                    </div>
                    <?php
                   
                }
            }
        ?>
                   <?php
                   Database::disconnect();
                  ?>
        </div>
    </div>
  </body>
  <footer>
  <svg viewBox="0 0 120 28">
   <defs> 
      <filter id="goo">
        <feGaussianBlur in="SourceGraphic" stdDeviation="1" result="blur" />
        <feColorMatrix in="blur" mode="matrix" values="
             1 0 0 0 0  
             0 1 0 0 0  
             0 0 1 0 0  
             0 0 0 13 -9" result="goo" />
        <xfeBlend in="SourceGraphic" in2="goo" />
      </filter>
       <path id="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
    </defs> 
  
     <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2" ></use> 
     <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0" ></use>
   
   
    <g class="gooeff" filter="url(#goo)">
    <circle class="drop drop1" cx="20" cy="2" r="8.8"  />
    <circle class="drop drop2" cx="25" cy="2.5" r="7.5"  />
    <circle class="drop drop3" cx="16" cy="2.8" r="9.2"  />
    <circle class="drop drop4" cx="18" cy="2" r="8.8"  />
    <circle class="drop drop5" cx="22" cy="2.5" r="7.5"  />
    <circle class="drop drop6" cx="26" cy="2.8" r="9.2"  />
    <circle class="drop drop1" cx="5" cy="4.4" r="8.8"  />
    <circle class="drop drop2" cx="5" cy="4.1" r="7.5"  />
    <circle class="drop drop3" cx="8" cy="3.8" r="9.2"  />
    <circle class="drop drop4" cx="3" cy="4.4" r="8.8"  />
    <circle class="drop drop5" cx="7" cy="4.1" r="7.5"  />
    <circle class="drop drop6" cx="10" cy="4.3" r="9.2"  />
    
    <circle class="drop drop1" cx="1.2" cy="5.4" r="8.8"  />
    <circle class="drop drop2" cx="5.2" cy="5.1" r="7.5"  />
    <circle class="drop drop3" cx="10.2" cy="5.3" r="9.2"  />
      <circle class="drop drop4" cx="3.2" cy="5.4" r="8.8"  />
    <circle class="drop drop5" cx="14.2" cy="5.1" r="7.5"  />
    <circle class="drop drop6" cx="17.2" cy="4.8" r="9.2"  />
    <use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />
   </g>   
  </svg>
</html>