<?php

	require_once "models/Connection.php";

	class Size{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		
		function list(){
			$query="SELECT * FROM sizes";
			$cats= array();
			$stmt= mysqli_query($this->conn, $query);

			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 mysqli_free_stmt($stmt);
			return json_encode($cats);
		}
		function size_product_detail($code){
			$sql="SELECT DISTINCT size_id, sizes.name as size FROM product_details as product_detail, sizes,products WHERE size_id= sizes.id AND product_detail.product_id= products.product_id AND quantity > 0 AND products.product_code='".$code;
			$cats= array();
			$stmt= mysqli_query($this->conn, $sql);

			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 mysqli_free_stmt($stmt);

			

			return json_encode($cats);
		}
		
	}
?>