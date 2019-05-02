<?php 
	/**
	 * 
	 */
	class Image 
	{
		
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function list(){
			$query="SELECT * FROM product_images ";
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
		function slider(){
			
			$query="SELECT * FROM sliders ";
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
			$sql="SELECT DISTINCT color_id , colors.name as color FROM product_details as product_detail, colors,products WHERE  color_id= colors.id AND product_detail.product_id= products.product_id  AND quantity > 0 AND  products.product_code='".$code;
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