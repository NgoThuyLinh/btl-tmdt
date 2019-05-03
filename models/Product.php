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
			$query="SELECT * FROM products LIMIT 10";
			$stmt= mysqli_query($this->conn, $query);
			do {
			    while ($row = mysqli_fetch_assoc($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);
			return json_encode(($cats));	
		}
		// Sản phẩm bán chạy
		function list_top(){
			$query="select DISTINCT products.id,products.name, products.price,category_id,description from products, product_details,(select product_detail_id,count(quantity) as quantity from order_detail GROUP BY product_detail_id ORDER BY quantity) as order_detail WHERE  products.id= product_details.product_id AND product_details.id= order_detail.product_detail_id LIMIT 10";
			$stmt= mysqli_query($this->conn, $query);
			do {
			    while ($row = mysqli_fetch_assoc($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);
			return json_encode(($cats));
		}
		// Sản phẩm mới nhất
		function list_new(){
			$query="SELECT * FROM products ORDER BY created_at  LIMIT 8";
			$stmt= mysqli_query($this->conn, $query);
			do {
			    while ($row = mysqli_fetch_assoc($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);
			return json_encode(($cats));
		}
		function find($code){
			$query="SELECT * FROM products WHERE code= '".$code."'";
						
			$sql1="SELECT * FROM products,product_details where products.id=product_details.product_id  AND products.code='".$code."'AND product_details.quantity> 0 LIMIT 1";
			$result=mysqli_query($this->conn, $sql1);
			$cats= array();
			$stmt= mysqli_query($this->conn, $query);
			if ($stmt->num_rows>0) {
				 while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			}
			if ($result->num_rows>0) {
				$cats[]=true;
			}
			return json_encode(($cats));
		}
		function finddetail($code){
			$query="SELECT products.name,product_detail.product_id as product_id, size_id, color_id, sizes.name as size, colors.name as color, quantity, price FROM products,product_details as product_detail,sizes,colors WHERE products.id = product_detail.product_id AND size_id=sizes.id AND color_id=colors.id AND product_code= '".$code."'";
			
			$cats= array();
			$stmt= mysqli_query($this->conn, $query);

			do {
			    while ($row = mysqli_fetch_array($stmt)){
			       $cats[] = $row; 
			    }
			} while (mysqli_next_result($this->conn));
			return json_encode($cats);
		}

		function searchProduct($data){
			if(isset($data->color) && !isset($data->size)){
				$query="SELECT DISTINCT products.id as product_id, products.category_id, categories.name as category, code, description,price, products.name as name FROM products, product_details as product_detail, categories WHERE products.id=product_detail.product_id AND products.category_id=categories.id AND categories.id=".$data->category."  AND product_detail.color_id=".$data->color." AND products.price > ".$data->minamount." AND products.price < ".$data->maxamount;
			}else if(isset($data->size) && !isset($data->color)){
				$query="SELECT DISTINCT products.id as product_id, products.category_id, categories.name as category, code, description,price, products.name as name FROM products, product_details as product_detail, categories WHERE products.id=product_detail.product_id AND products.category_id=categories.id AND categories.id=".$data->category."  AND product_detail.size_id='".$data->size." AND products.price > ".$data->minamount." AND products.price < ".$data->maxamount;
			}else if(isset($data->color) && isset($data->color)){
				$query="SELECT DISTINCT products.id as product_id, products.category_id, categories.name as category, code, description,price, products.name as name FROM products, product_details as product_detail, categories WHERE products.id=product_detail.product_id AND products.category_id=categories.id AND categories.id=".$data->category."  AND product_detail.size_id='".$data->size."'AND product_detail.color_id=".$data->color." AND products.price > ".$data->minamount." AND products.price < ".$data->maxamount;
			}else {
				$query="SELECT DISTINCT products.id as product_id, products.category_id, categories.name as category, code, description,price, products.name as name FROM products, product_details as product_detail, categories WHERE products.id=product_detail.product_id AND products.category_id=categories.id AND categories.id=".$data->category."  AND products.price > ".$data->minamount." AND products.price < ".$data->maxamount;
			}

			$cats= array();
			$stmt= mysqli_query($this->conn, $query);

			do {
			    while ($row = mysqli_fetch_assoc($stmt)){
			       $cats[] = $row;
			    }
			} while (mysqli_next_result($this->conn));
			 // sqlsrv_free_stmt($stmt);
			return json_encode($cats );
			// var_dump($query);die();
		}
		
	}
?>