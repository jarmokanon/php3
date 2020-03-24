<?php
    include("../../dashboard/navbar4.php");
	require_once("../../config/db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE admin SET username=? , password=? WHERE id=?");
		$username=$_POST['username'];
		$password = $_POST['password'];
		$sql->bind_param("ssi",$username, $password,$_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT * FROM admin WHERE id=?");
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
<title>admin edit </title>
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<br>
<br>
<br>
<form name="frmUser" method="post" action="">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Employee Edit</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>username</label></td>
			<td><input type="text" name="username" class="txtField" value="<?php echo $row["username"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>password</label></td>
			<td><input type="text" name="password" class="txtField" value="<?php echo $row["password"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>