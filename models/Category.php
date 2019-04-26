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
			$query="SELECT DISTINCT products.product_id as product_id, products.category_id, categories.name as category, product_code, description,price,img, products.name as name FROM products, [NDMinh].[ShopServer].[dbo].product_details as product_detail, categories WHERE products.product_id=product_detail.product_id AND products.category_id=categories.category_id AND branch_id=".$_SESSION['branch_id']." AND categories.category_id=".$category_id;
			
			$cats= array();
			$stmt= sqlsrv_query($this->conn, $query);

			do {
			    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			       $cats[] = $row;
			    }
			} while (sqlsrv_next_result($stmt));
			 sqlsrv_free_stmt($stmt);
			return json_encode($cats );
		}
		
		function list(){
			$query="SELECT * FROM categories";
			$cats= array();
			$stmt= sqlsrv_query($this->conn, $query);

			do {
			    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			       $cats[] = $row; 
			    }
			} while (sqlsrv_next_result($stmt));
			 sqlsrv_free_stmt($stmt);

			return json_encode($cats);
		}
	}
?>