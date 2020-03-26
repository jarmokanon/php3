<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/home.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
</head>

<body>
<ul>
  <li><a class="left" href="homepage.php">Home</a></li>
  <li><a class="left" href="tickets.php">tickets</a></li>
  <li><a class="right" href="login.php">Hey, <?php echo $_SESSION['username']; ?> hier kun je uitloggen.</a></li>
</ul>
<header>
</header>
<div class="bar">
    <h1 class="bartxt">Eerstvolgende events:</h1>
</div>
<div id="container">
    <div class="container">
            <div class="row">

                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM `customers` ORDER BY `customers`.`date` ASC';
                   foreach ($pdo->query($sql) as $data){?>
                    <div class="card">
                    <!-- <img src="" alt="" style="width:100%"> -->
                    <?php echo "<img src='assets/img/".$data['image']."' >";?>
                    <h1><?php echo $data['name'] ?></h1>
                    <p class="price"><?php echo $data['title'] ?></p>
                    <p><?php echo $data['date']; ?></p>
                    <p>beschikbare tickets: <?php echo $data['ticket']; ?></p>
                    <!-- <button><a class="btn" href="read.php?id='.$data['id'].'">bestellen</a></button> -->
                    <?php echo '<button><a class="btn" href="read.php?id='.$data['id'].'">Bestellen</a></button>'; ?>
                    <!-- <p><button>kaarten kopen</button></p> -->
                    </div>
                   <?php
                   };
                   Database::disconnect();
                  ?>
        </div>
    </div>