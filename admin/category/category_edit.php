<?php
    include("../../dashboard/navbar5.php");
	require_once("../../config/db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE category SET name=? , description=? , active=? WHERE id=?");
		$name = $_POST['name'];
		$description = $_POST['description'];
        $active= $_POST['active'];
		$sql->bind_param("ssii",$name, $description, $active, $_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT * FROM category WHERE id=?");
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
<div class="button_link"><a href="category_overview.php" >Back to List </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Category Edit</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>namer</label></td>
			<td><input type="text" name="name" class="txtField" value="<?php echo $row["name"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>description</label></td>
			<td><input type="text" name="description" class="txtField" value="<?php echo $row["description"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>active</label></td>
			<td><input type="number" name="active" class="txtField" value="<?php echo $row["active"]?>"></td>
        </tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>