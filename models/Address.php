<?php

	require_once "models/Connection.php";

	class Address{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
		function address(){
			$sql="SELECT * FROM cities";
			$sql1="SELECT * FROM districts";
			$sql2="SELECT * FROM village";
			$result=$this->conn->query($sql);
			$result1=$this->conn->query($sql1);
			$result2=$this->conn->query($sql2);
			$city=array();
			$district=array();
			$village=array();
			$product=array();
			$data=array();
			if ($result->num_rows>0) {
				while ($row=$result->fetch_assoc()) {
					$city[]=$row;
				}
				while ($row1=$result1->fetch_assoc()) {
					$district[]=$row1;
				}
				while ($row2=$result2->fetch_assoc()) {
					$village[]=$row2;
				}
				
			}
			$data['city']=$city;
			$data['district']=$district;
			$data['village']=$village;
			return (json_encode($data));
		}
		
	}
?>