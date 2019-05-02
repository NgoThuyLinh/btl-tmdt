<?php
	
	require_once "models/Connection.php";
	class ProductDetail
	{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function findproduct($code,$size,$color,$quantity){
			// kiểm tra số lượng mua hàng
			$query="SELECT * FROM  product_details as product_detail,products WHERE products.product_id=product_detail.product_id AND product_code='".$code."'AND size_id=".$size." AND color_id=".$color." AND quantity >=".$quantity;
			// $query="SELECT * FROM product_details,products WHERE products.product_id=product_details.product_id AND product_code='".$code."'AND size_id=".$size." AND color_id=".$color." AND quantity >=".$quantity;
			echo $query;
			$stmt= sqlsrv_query($this->conn, $query , array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
			$rows =  sqlsrv_num_rows($stmt);
			if ($rows<=0) {
				return true;
			}
			return false;	
		}
		
	}
?>