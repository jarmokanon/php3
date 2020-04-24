<?php
 $con = mysqli_connect('localhost', 'u532747_webshop', 'Wordpress1', 'u532747_webshop') or die('Cannot connect to database. '.mysqli_connect_error());
 if($con) echo 'You are connected!<br/>';
?>