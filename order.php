<?php
    include("shop/nav.php");
    require 'config/database.php';
    $value = null;
    if ( !empty($_GET['product_id'])) {
        $value = $_REQUEST['product_id'];
    }
     
    if ( null==$value ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT product.id, product.name, product.description, product.price, product.color, product.weight, category.name AS category, product_image.image FROM `product` INNER JOIN product_image ON product.id = product_image.product_id INNER JOIN category ON product.category_id = category.id WHERE product_id = $value GROUP BY product.id";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>Iphone 8</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="assets/css/style4.css" rel="stylesheet">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <meta name="robots" content="noindex,follow" /> -->

  </head>
  <header class="header"></header>   

  <body>
    <main class="container">

      <div class="left-column">
        <!-- <img data-image="black" class="active" src="8black.png" alt=""> -->
        <?php echo "<img data-image='black' class='active' src='admin/product/".$data['image']."' >";?>
      </div>

      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span><?php echo $data['category']; ?></span>
          <h1><?php echo $data['name'] ?></h1>
          <br>
          <textarea rows="10" cols="50" readonly><?php echo $data['description']; ?></textarea>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>kleur</span>
            <p><?php echo $data['color']; ?></p>
          </div>
        <!-- Product Pricing -->
        <div class="product-price">
          <span>$<?php echo $data['price'] ?></span>
          <a href="formulier.php" class="cart-btn">Bestellen</a>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="js/scriptpage.js" charset="utf-8"></script>
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
