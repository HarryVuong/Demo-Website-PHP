<?php

	require_once("/Entities/product.class.php");

?>

<?php


	require_once("header.php");


	$prods = Product::list_product();


	foreach($prods as $item){
		echo "<p>ten san pham :".$item["ProductName"]."</p>";

		echo "<p>Loai san pham :".$item["CategoryName"]."</p>";

		echo "<p>Gia san pham :".$item["Price"]."</p>";
		echo "<p>So luong san pham :".$item["Quantity"]."</p>";
		echo "<p>Mieu ta san pham :".$item["Description"]."</p>";
		echo "<img src='".$item["Picture"]."' width=150px height=150px /></br>";
		echo " ---------------------------------------------- ";
	}




?>
