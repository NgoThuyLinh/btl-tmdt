<?php 
	/**
	 * 
	 */
	class Color 
	{
		
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function list(){
			$query="SELECT * FROM colors";
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
		function color_product_detail($code){
			$sql="SELECT DISTINCT color_id , colors.name as color FROM [NDMinh].[ShopServer].[dbo].product_details as product_detail, colors,products WHERE  color_id= colors.id AND product_detail.product_id= products.product_id  AND quantity > 0 AND  products.product_code='".$code."'AND branch_id=".$_SESSION['branch_id'];
			$cats= array();
			$stmt= sqlsrv_query($this->conn, $sql);

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