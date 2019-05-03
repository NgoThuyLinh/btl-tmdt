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
			$stmt= mysqli_query($this->conn, $query);

			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);

			

			return json_encode($cats);
		}
		function color_product_detail($code){
			$sql="SELECT DISTINCT color_id , colors.name as color,hexa FROM product_details as product_detail, colors,products WHERE  color_id= colors.id AND product_detail.product_id= products.id  AND quantity > 0 AND  products.code='".$code."'";
			$cats= array();
			$stmt= mysqli_query($this->conn, $sql);
			
			if ($stmt->num_rows>0) {
				while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			}
			
			return json_encode($cats);
		}
	}
 ?>