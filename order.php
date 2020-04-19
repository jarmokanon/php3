<?php
     
    require 'shop/nav.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $customer_idError = null;
        $dateError = null;
        $streetError = null;
        $houseNumberError = null;
        $houseNumber_addonError = null;
        $zipCodeError = null;
        $cityError = null;
        $countryError = null;
        $paidError = null;
        $deliveryError = null;
         
        // keep track post values
        $customer_id = $_POST['customer_id'];
        $date = $_POST['date'];
        $street = $_POST['street'];
        $houseNumber = $_POST['houseNumber'];
        $houseNumber_addon = $_POST['housen$houseNumber_addon'];
        $zipCode = $_POST['zipCode'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $paid = $_POST['paid'];
        $delivery = $_POST['delivery'];
         
        // validate input
        $valid = true;
        if (empty($street)) {
            $streetError = 'Vul een straat in';
            $valid = false;
        }
         
        if (empty($houseNummber)) {
            $houseNumberError = 'vul een geldig huisnummer in';
            $valid = false;
        }
         
        if (empty($zipCode)) {
            $zipCodeError = 'Vul uw postcode in';
            $valid = false;
        }

        if (empty($city)) {
            $cityError = 'Vul de woonplaats in';
            $valid = false;
        }
        if (empty($country)) {
            $countryError = 'Vul het land in';
            $valid = false;
        }
        if (empty($paid)) {
            $paidError = 'Vul alstublieft een betaaloptie in';
            $valid = false;
        }
        $valid = true;
        if (empty($delivery)) {
            $deliveryError = 'kies een bezorg optie';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tbl_order (cutstomer_id,date,street,houseNumber,houseNumber_addon,zipCode,city,country,paid,delivery) values(?, ?, ?, ?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($customer_id,$date,$street,$houseNumber,$houseNumber_addon,$zipCode,$city,$country,$paid,$delivery));
            Database::disconnect();
            header("Location: thanks.php");
        }
    }
?>
<?php
session_start();
    $id = null;
    if ( !empty($_GET['product.id'])) {
        $id = $_REQUEST['product.id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT product.id, product.name, product.description, product.price, product.color, product.weight, category.name AS category, product_image.image FROM `product` INNER JOIN product_image ON product.id = product_image.product_id INNER JOIN category ON product.category_id = category.id WHERE product.id = $id GROUP BY product.id ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/order.css" rel="stylesheet">
    <!-- <script src="js/bootstrap.min.js"></script> -->
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>bestellen</h3>
                    </div>
             
                    <form class="form-horizontal" action="order.php" method="post">
                      <div class="control-group <?php echo !empty($customer_idError)?'error':'';?>">
                        <label class="control-label">Naam</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="naam" value="<?php echo !empty($customer_id)?$customer_id:'';?>">
                            <?php if (!empty($customer_idError)): ?>
                                <span class="help-inline"><?php echo $customer_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">titel</label>
                        <div class="controls">
                            <input name="email" type="email"  placeholder="email" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($streetError)?'error':'';?>">
                        <label class="control-label">bericht</label>
                        <div class="controls">
                            <input name="adres" type="text"  placeholder="adres" value="<?php echo !empty($street)?$street:'';?>">
                            <?php if (!empty($streetError)): ?>
                                <span class="help-inline"><?php echo $streetError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($houseNumberError)?'error':'';?>">
                        <label class="control-label">datum</label>
                        <div class="controls">
                            <input name="provincie" type="text" placeholder="provincie" value="<?php echo !empty($houseNumber)?$houseNumber:'';?>">
                            <?php if (!empty($houseNumberError)): ?>
                                <span class="help-inline"><?php echo $houseNumberError;?></span>
                            <?php endif;?>
                        </div>
                        <div class="control-group <?php echo !empty($houseNumber_addonError)?'error':'';?>">
                        <label class="control-label">plaats</label>
                        <div class="controls">
                            <input name="plaats" type="text" placeholder="plaats" value="<?php echo !empty($houseNumber_addon)?$houseNumber_addon:'';?>">
                            <?php if (!empty($houseNumber_addonError)): ?>
                                <span class="help-inline"><?php echo $houseNumber_addonError;?></span>
                            <?php endif;?>
                        </div>
                        <div class="control-group <?php echo !empty($zipCodeError)?'error':'';?>">
                        <label class="control-label">postcode</label>
                        <div class="controls">
                            <input name="postcode" type="text" placeholder="postcode" value="<?php echo !empty($zipCode)?$zipCode:'';?>">
                            <?php if (!empty($zipCodeError)): ?>
                                <span class="help-inline"><?php echo $zipCodeError;?></span>
                            <?php endif;?>
                        </div>
                        <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                        <label class="control-label">postcode</label>
                        <div class="controls">
                            <input name="postcode" type="text" placeholder="postcode" value="<?php echo !empty($city)?$city:'';?>">
                            <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $cityError;?></span>
                            <?php endif;?>
                        </div>
                        <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
                        <label class="control-label">postcode</label>
                        <div class="controls">
                            <input name="postcode" type="text" placeholder="postcode" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($countryError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
                            <?php endif;?>
                        </div>
                        <div class="control-group <?php echo !empty($paidError)?'error':'';?>">
                        <label class="control-label">postcode</label>
                        <div class="controls">
                            <input name="postcode" type="text" placeholder="postcode" value="<?php echo !empty($paid)?$paid:'';?>">
                            <?php if (!empty($paidError)): ?>
                                <span class="help-inline"><?php echo $paidError;?></span>
                            <?php endif;?>
                        </div>
                        <div class="control-group <?php echo !empty($deliveryError)?'error':'';?>">
                        <label class="control-label">ticket</label>
                        <div class="controls">
                            <input name="ticket" type="number" placeholder="ticket" value="<?php echo !empty($delivery)?$delivery:'';?>">
                            <?php if (!empty($deliveryError)): ?>
                                <span class="help-inline"><?php echo $deliveryError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Bestellen</button>
                          <a class="btn" href="index.php">terug</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
