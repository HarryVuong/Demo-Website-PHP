<?php

	$hostname = "localhost";
	$username = "root";
	$password = "123456";
	$databasename = "ecommerce";

	$connect =  mysqli_connect($hostname, $username, $password, $databasename);
	$query = 'SELECT * FROM `category`';

	$result = mysqli_query($connect, $query);

	require_once("/Entities/product.class.php");

	if(isset($_POST["btnsubmit"])){
		$productName = $_POST["txtName"];
		$cateID = $_POST["txtCateID"];
		$price = $_POST["txtPrice"];
		$quantity = $_POST["txtquantity"];
		$description = $_POST["txtdesc"];
		$picture = $_POST["txtPic"];

		$newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

		$result = $newProduct->save();

		if(!$result){
			header("Location: add_product.php?failure");
		}else{
			header("Location: add_product.php?inserted");
		}

	}

?>

<?php include_once("header.php"); ?>

<?php

	if(isset($_GET["inserted"])){
		echo "<h2>Them san pham thanh cong</h2>";
	}

?>

<form method="post">
	<div class="row">
		<div class="lbltitle">
			<label>Ten San Pham</label>
		</div>
		<div class="lblinput">
			<input type="text" name="txtName" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : "" ?>" />
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Mo Ta San Pham</label>
		</div>
		<div class="lblinput">
			<textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST['txtdesc']) ? $_POST['txtdesc'] : "" ?>"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>So Luong San Pham</label>
		</div>
		<div class="lblinput">
			 <input type="text" name="txtquantity" value="<?php echo isset($_POST['txtquantity']) ? $_POST['txtquantity'] : "" ?>" />
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Gia San Pham</label>
		</div>
		<div class="lblinput">
			 <input type="text" name="txtPrice" value="<?php echo isset($_POST['txtPrice']) ? $_POST['txtPrice'] : "" ?>" />
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Loai San Pham</label>
		</div>
		<div class="lblinput">
			 <select name="txtCateID">
			 	<?php while($rows = mysqli_fetch_array($result)):;?>
			 		<option value="<?php echo $rows[0];?>"><?php echo $rows[1];?></option>
			 	<?php endwhile;?>
			 </select>
		</div>
	</div>

	<div class="row">
		<div class="lbltitle">
			<label>Hinh San Pham</label>
		</div>
		<div class="lblinput">
			 <input type="text" name="txtPic" value="<?php echo isset($_POST['txtPic']) ? $_POST['txtPic'] : "" ?>" />
		</div>
	</div>

	<div class="row">
		<div class="submit">
			<input type="submit" name="btnsubmit" value="Them san pham">
		</div>
	</div>
</form>
