<?php

	require_once "models/Connection.php";

	class Branch{
		var $conn;
		function __construct(){
			$object= new Connection();
			$this->conn=$object->conn;
		}
				
		function list(){
			$query="SELECT * FROM branchs";
			$cats= array();
			$stmt= sqlsrv_query($this->conn, $query);

			do {
			    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			       $cats[] = $row; 
			    }
			} while (sqlsrv_next_result($stmt));
			 sqlsrv_free_stmt($stmt);


			return json_encode($cats);
		}	
	}
?>