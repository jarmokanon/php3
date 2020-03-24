<?php
    include("../../dashboard/navbar3.php");
	require_once("../../config/db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE customer SET gender=? , firstname=? , middlename=? , lastname=? , street=? , housenumber=? , housenumber_addon=? , zipcode=? , city=? , phone=? , e-mailadres=? , password=? , newsletter_subscription=? WHERE id=?");
		$gender=$_POST['gender'];
		$firstname = $_POST['firstname'];
        $middlename= $_POST['middlename'];
        $lastname=$_POST['lastname'];
		$street = $_POST['street'];
        $housenumber= $_POST['housenumber'];
        $housenumber_addon=$_POST['housenumber_addon'];
        $zipcode = $_POST['zipcode'];
        $city= $_POST['city'];
        $phone=$_POST['phone'];
		$emailadres = $_POST['e-mailadres'];
        $password= $_POST['password'];
        $newsletter_subscription=$_POST['newsletter_subscription'];
		$sql->bind_param("issssissssssi",$gender, $firstname, $middlename, $lastname, $street, $housenumber, $housenumber_addon, $zipcode, $city, $phone, $emailadres, $password, $newsletter_subscription, $_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT * FROM customer WHERE id=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
<title>customer edit</title>
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="customer_overview.php" >Back to List </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Customer Edit</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>gender</label></td>
			<td><input type="number" name="gender" class="txtField" value="<?php echo $row["gender"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>firstname</label></td>
			<td><input type="text" name="firstname" class="txtField" value="<?php echo $row["firstname"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>middlename</label></td>
			<td><input type="text" name="middlename" class="txtField" value="<?php echo $row["middlename"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>lastname</label></td>
			<td><input type="text" name="lastname" class="txtField" value="<?php echo $row["lastname"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>street</label></td>
			<td><input type="text" name="street" class="txtField" value="<?php echo $row["street"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>housenumber</label></td>
			<td><input type="text" name="housenumber" class="txtField" value="<?php echo $row["housenumber"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>housenumber_addon</label></td>
			<td><input type="text" name="housenumber_addon" class="txtField" value="<?php echo $row["housenumber_addon"]?>"></td>
		</tr>
        <tr class="table-row">
			<td><label>zipcode</label></td>
			<td><input type="text" name="zipcode" class="txtField" value="<?php echo $row["zipcode"]?>"></td>
		</tr>
        <tr class="table-row">
			<td><label>city</label></td>
			<td><input type="text" name="city" class="txtField" value="<?php echo $row["city"]?>"></td>
		</tr>
        <tr class="table-row">
			<td><label>phone</label></td>
			<td><input type="text" name="phone" class="txtField" value="<?php echo $row["phone"]?>"></td>
		</tr>
        <tr class="table-row">
			<td><label>e-mailadres</label></td>
			<td><input type="text" name="e-mailadres" class="txtField" value="<?php echo $row["e-mailadres"]?>"></td>
		</tr>
        <tr class="table-row">
			<td><label>password</label></td>
			<td><input type="text" name="password" class="txtField" value="<?php echo $row["password"]?>"></td>
		</tr>
        <tr class="table-row">
			<td><label>newsletter_subscription</label></td>
			<td><input type="text" name="newsletter_subscription" class="txtField" value="<?php echo $row["newsletter_subscription"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>