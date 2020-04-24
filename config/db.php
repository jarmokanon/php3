<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","u532747_webshop","Wordpress1","u532747_webshop");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<?php
		$conn =new mysqli('localhost', 'u532747_webshop', 'Wordpress1' , 'u532747_webshop');
?>