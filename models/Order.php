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
			$query="INSERT INTO [NDMinh].[ShopServer].[dbo].orders(customer_id,address_receive,phone_receive,order_code,created_at,status,delivery,branch_id) VALUES('".$data['customer_id']."','".$data['address_receive']."','".$data['phone_receive']."','".$code."','".Date('Y-m-d H:i:s')."','0','".$data['delivery']."',".$_SESSION['branch_id'].")";
			$stmt= sqlsrv_query($this->conn, $query);
			echo sqlsrv_rows_affected($stmt);
			if (sqlsrv_rows_affected($stmt)>0) {
				foreach ($_SESSION['cart'] as $key => $value) {
					$sql="SELECT product_detail.id as productdetail_id,price FROM [NDMinh].[ShopServer].[dbo].product_details as product_detail ,products WHERE product_detail.product_id= products.product_id AND color_id =".$value['color_id']." AND size_id= ".$value['size_id']." AND branch_id=".$_SESSION['branch_id'];
					
					$sql1=sqlsrv_query($this->conn,$sql);
					$arr=sqlsrv_fetch_array($sql1, SQLSRV_FETCH_ASSOC);
					var_dump($arr);
					$sql2="INSERT INTO [NDMinh].[ShopServer].[dbo].order_details(product_detail_id,quantity_buy,price,order_code,created_at) VALUES(".$arr['productdetail_id'].",".$value['quantity_buy'].",".$arr['price'].",'".$code."','".Date('Y-m-d H:i:s')."')";
					echo $sql2;
					$result=sqlsrv_query($this->conn,$sql2);
				}
			}
			if (!$stmt) {
				return false;
			}
			return true;

		}
		function listproductcart($value)
		{
			$sql="SELECT sizes.name as size_name ,colors.name as color_name,products.*,product_detail.id as productdetail_id,price FROM [NDMinh].[ShopServer].[dbo].product_details as product_detail ,products, colors , sizes WHERE product_detail.size_id= sizes.id AND product_detail.color_id= colors.id AND product_detail.product_id= products.product_id AND color_id =".$value['color_id']." AND size_id= ".$value['size_id']." AND branch_id=".$_SESSION['branch_id']." AND products.product_code ='".$value['product_code']."'";
			$sql1=sqlsrv_query($this->conn,$sql);
		    return json_encode(sqlsrv_fetch_array($sql1, SQLSRV_FETCH_ASSOC));
			
		}
	}
?>