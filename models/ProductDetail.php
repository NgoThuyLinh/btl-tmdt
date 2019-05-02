<?php
	
	require_once "models/Connection.php";
	class ProductDetail
	{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
			// kiểm tra số lượng mua hàng
		function findproduct($code,$size,$color,$quantity){
			$query="SELECT * FROM  product_details as product_detail,products WHERE products.id=product_detail.product_id AND code='".$code."' AND size_id=".$size." AND color_id=".$color." AND quantity >=".$quantity;
			$stmt= mysqli_query($this->conn, $query);
			$rows =  mysqli_num_rows($stmt);
			
			if ($rows<=0) {
				return true;
			}
			return false;	
		}
		
	}
?>