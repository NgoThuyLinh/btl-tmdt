<?php
	
	require_once "models/Connection.php";
	class Product
	{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function list()
		{
			$query="SELECT * FROM products";
			$stmt= sqlsrv_query($this->conn, $query);
			do {
			    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			       $cats[] = $row; 
			    }
			} while (sqlsrv_next_result($stmt));
			 sqlsrv_free_stmt($stmt);
			return json_encode(($cats));	
		}
		function find($code){
			$query="SELECT * FROM products WHERE product_code= '".$code."'";
			$sql1="SELECT TOP(1) * FROM products,[NDMinh].[ShopServer].[dbo].product_details as product_detail where products.product_id=product_detail.product_id AND product_code='".$code."'AND branch_id=".$_SESSION['branch_id'];
			
			// $sql1="SELECT TOP(1) * FROM products,product_details where products.product_id=product_details.product_id AND product_code='".$code."'AND branch_id=".$_SESSION['branch_id'];
			$result=sqlsrv_query($this->conn, $sql1);
			$cats= array();
			$stmt= sqlsrv_query($this->conn, $query);
			do {
			    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			       $cats[] = $row; 
			    }
			} while (sqlsrv_next_result($stmt));
			 sqlsrv_free_stmt($stmt);
			$cats[]=(sqlsrv_free_stmt($result));
			return json_encode(($cats));
		}
		function finddetail($code){
			$query="SELECT products.name,product_detail.product_id as product_id, size_id, color_id, sizes.name as size, colors.name as color, quantity, price FROM products, [NDMinh].[ShopServer].[dbo].product_details as product_detail,sizes,colors WHERE products.product_id = product_detail.product_id AND size_id=sizes.id AND color_id=colors.id AND product_code= '".$code."'AND branch_id=".$_SESSION['branch_id'];
			
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