<?php

	require_once("/config/db.class.php");

	/**
	 * 
	 */
	class Product
	{

		public $productID;
		public $productName;
		public $cateID;
		public $price;
		public $quantity;
		public $description;
		public $picture;
		
		function Product($product_name, $cate_id, $price, $quantity, $desc, $picture)
		{
			$this->productName = $product_name;
			$this->cateID = $cate_id;
			$this->price = $price;
			$this->quantity = $quantity;
			$this->description = $desc;
			$this->picture = $picture;
		}

		public function save(){
			$db = new Db();
			$sql = "INSERT INTO Product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES 
			('$this->productName','$this->cateID','$this->price','$this->quantity','$this->description','$this->picture')";

			$result = $db->query_execute($sql);
			return $result;
		} 

		public static function list_product(){
			$db = new Db();
			$sql = "SELECT * FROM product a , category b WHERE a.CateID = b.CateID";
			$result = $db->select_to_array($sql);
			return $result;
		}
	}

?>