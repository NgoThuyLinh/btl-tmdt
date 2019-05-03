<?php

	require_once "models/Connection.php";

	class Category{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function listproduct($category_id)
		{
			$query="SELECT DISTINCT products.id as product_id, products.category_id, categories.name as category, code, description,price, products.name as name FROM products, product_details as product_detail, categories WHERE products.id=product_detail.product_id AND products.category_id=categories.id AND categories.id=".$category_id;
			// echo $query; die();
			
			// var_dump($cats);die();
			$cats= array();
			$stmt= mysqli_query($this->conn, $query);

			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row;
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);
			return json_encode($cats );
		}
		
		function list(){
			$query="SELECT * FROM categories";
			$cats= array();
			$stmt= mysqli_query($this->conn, $query);

			do {
			    while ($row = mysqli_fetch_assoc($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);

			return json_encode($cats);
		}
	}
?>