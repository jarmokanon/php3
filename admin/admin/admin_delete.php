<?php
include("../../config/del.php");
if( isset($_GET['del']) ) {
	$id = $_GET['del'];
	$query = "DELETE FROM `admin` WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot delete data from database. '.mysqli_error($con));
	if($result) {
	  echo 'Data deleted from database.';
	  mysqli_free_result($result);
	  header('Location:admin_overview.php');
	}
   }
?>