<?php
 $con = mysqli_connect('localhost', 'root', '', 'webshop') or die('Cannot connect to database. '.mysqli_connect_error());
 if($con) echo 'You are connected!<br/>';
?>