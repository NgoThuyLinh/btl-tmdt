<?php

	class Connection
	{
		var $conn;
		function __construct()
		{
			$serverName = "NDMINH";
			$connectionInfo = array( "Database"=>"ShopServer", "UID"=>"sa", "PWD"=>"123456","CharacterSet" => "UTF-8");
			
			$this->conn= sqlsrv_connect( $serverName, $connectionInfo);
			if (!$this->conn) {
				 die( print_r( sqlsrv_errors(), true));
			}
		}
	}

?>