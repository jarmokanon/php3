<?php
	require_once("../../config/db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE product SET name=? , description=? , category_id=? , price=? , color=? , weight=? , active=? WHERE id=?");
		$name=$_POST['name'];
		$description = $_POST['description'];
        $category_id= $_POST['category_id'];
        $price=$_POST['price'];
		$color = $_POST['color'];
        $weight= $_POST['weight'];
        $active=$_POST['active'];
		$sql->bind_param("ssssssss",$name, $description, $category_id, $price, $color, $weight, $active,$_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT * FROM product WHERE id=?");
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
<title>employee edit </title>
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="index.php" >Back to List </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Employee Edit</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Name</label></td>
			<td><input type="text" name="name" class="txtField" value="<?php echo $row["name"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Description</label></td>
			<td><input type="text" name="description" class="txtField" value="<?php echo $row["description"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>category_id</label></td>
			<td><input type="text" name="category_id" class="txtField" value="<?php echo $row["category_id"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>price</label></td>
			<td><input type="text" name="price" class="txtField" value="<?php echo $row["price"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>color</label></td>
			<td><input type="text" name="color" class="txtField" value="<?php echo $row["color"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>weight</label></td>
			<td><input type="text" name="weight" class="txtField" value="<?php echo $row["weight"]?>"></td>
        </tr>
        <tr class="table-row">
			<td><label>active</label></td>
			<td><input type="text" name="active" class="txtField" value="<?php echo $row["active"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>