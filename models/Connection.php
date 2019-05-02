<?php

	class Connection
	{
		var $conn;
		function __construct()
		{
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="tmdt-shop";
			$this->conn= mysqli_connect($servername,$username,$password,$dbname);
			$this->conn->set_charset('utf8');
			if (!$this->conn) {
				die("Connection failed: " .mysqli_connect_error());
			}
			
		}
	}

?>