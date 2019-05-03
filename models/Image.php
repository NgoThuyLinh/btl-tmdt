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
		function img_product_detail($code,$color_id,$size_id){
			$sql="SELECT DISTINCT image FROM products, product_images,product_details WHERE product_details.product_image_id= product_images.id AND products.id=product_details.product_id  AND  products.code='".$code."' AND  color_id=".$color_id." AND size_id=".$size_id;
			$cats= array();
			$stmt= mysqli_query($this->conn, $sql);
			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			return json_encode($cats);
		}
		function img($code,$color_id){
			$sql="SELECT DISTINCT product_images.id as id,image FROM products, product_images,product_details WHERE product_details.product_image_id= product_images.id AND products.id=product_details.product_id  AND  products.code='".$code."' AND  color_id=".$color_id;
			$cats= array();
			$stmt= mysqli_query($this->conn, $sql);
			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			return json_encode($cats);
		}
	}
 ?>