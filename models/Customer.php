<?php

	require_once "models/Connection.php";

	class Customer{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		
		function find($data){
			$query="SELECT customer_id, name, username, address FROM customers WHERE username='".$data['username']."'AND password='".$data['password']."'";
			$cats= array();
			$stmt= sqlsrv_query($this->conn, $query);
		    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
		       $cats[] = $row; 
		    }
			 sqlsrv_free_stmt($stmt);
			
			 var_dump($cats);
			return json_encode($cats);
		}
		
	}
?>