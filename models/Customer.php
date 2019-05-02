<?php

	require_once "models/Connection.php";

	class Customer{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		
		function find($data){
			$query="SELECT id, name, username, address,phone,email FROM customers WHERE username='".$data['username']."'AND password='".$data['password']."'";
			$cats= array();
			$stmt= mysqli_query($this->conn, $query);
		    while ($row = mysqli_fetch_array($stmt)){
		       $cats[] = $row; 
		    }
			 // sqlsrv_free_stmt($stmt);
			
			 // var_dump($cats);
			return json_encode($cats);
		}

		function insert($data){
			$query="INSERT INTO customers(address,phone,name,username,email,password) VALUES('".$data['address']."','".$data['phone']."','".$data['name']."','".$data['username']."','".$data['email']."','".$data['password']."')";
			$stmt = mysqli_query($this->conn, $query);
			return $stmt;
		}
		
	}
?>