<?php

	require_once "models/Connection.php";

	class Order{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function createOrder($data){
			$code="ONLINE-".time();
			$query="INSERT INTO orders(customer_id,customer_name,customer_address,customer_phone,code,created_at,status,customer_email,description,city_id,district_id,village_id) VALUES('".$data['customer_id']."','".$data['customer_name']."','".$data['customer_address']."','".$data['customer_phone']."','".$code."','".Date('Y-m-d H:i:s')."','0','".$data['customer_email']."','".$data['description']."',".$data['city_id'].",".$data['district_id'].",".$data['village_id'].")";
			echo $query;
			// die();
			$stmt= mysqli_query($this->conn, $query);
			if (mysqli_affected_rows($this->conn)>0) {
				foreach ($_SESSION['cart'] as $key => $value) {
					
					$sql="SELECT product_details.id as product_detail_id,price,quantity FROM products,product_details WHERE products.id= product_id AND quantity >=".$value['quantity_buy']."  AND code='".$value['product_code']."' AND size_id=".$value['size_id']." AND color_id=".$value['color_id'];
					echo $sql;
					$sq= "SELECT orders.id as order_id FROM orders WHERE orders.code= '".$code."'";
					$sql1=mysqli_query($this->conn,$sql);
					$sq1=mysqli_query($this->conn,$sq);
					$arr=mysqli_fetch_array($sql1);
					$arr1=mysqli_fetch_array($sq1);
					if (mysqli_affected_rows($this->conn)>0) {
						$quantity=$arr['quantity']-$value['quantity_buy'];

						$sql2="INSERT INTO order_detail(product_detail_id,quantity,price,order_id) VALUES(".$arr['product_detail_id'].",".$value['quantity_buy'].",".$arr['price'].",'".$arr1['order_id']."')";
						$sql3="UPDATE product_details SET product_details.quantity = ".$quantity." WHERE product_details.id=".$arr['product_detail_id'];
						
						$result=mysqli_query($this->conn,$sql2);
						$result1=mysqli_query($this->conn,$sql3);
					}else{
						break;
					}
					
				}
			}else{
				return false;
			}
			
			return true;

		}
		function listproductcart($value)
		{
			$sql="SELECT sizes.name as size_name ,colors.name as color_name,products.*,product_detail.id as productdetail_id,price FROM product_details as product_detail ,products, colors , sizes WHERE product_detail.size_id= sizes.id AND product_detail.color_id= colors.id AND product_detail.product_id= products.id AND color_id =".$value['color_id']." AND size_id= ".$value['size_id']." AND products.code ='".$value['product_code']."'";
			$sql1=mysqli_query($this->conn,$sql);
		    return json_encode(mysqli_fetch_array($sql1));
			
		}
	}
?>