<?php
    include("shop/nav.php");
    $database_name = "webshop";
    $con = mysqli_connect("localhost","root","",$database_name);
 
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["product.id"],
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
                'product_id' => $_GET["product.id"],
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
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="shopping.php"</script>';
                }
            }
        }
    }
?>
 
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link   href="assets/css/cart.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
 
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #38ebc4;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #38ebc4;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #grey;
            background-color: #38ebc4;
            padding: 2%;
        }
        table th{
            background-color: #grey;
        }
    </style>
</head>
<body>
 
    <div class="container" style="width: 65%">
        <h2>Shopping Cart</h2>
        <div style="clear: both"></div>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
 
            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="shopping.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>
 
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
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