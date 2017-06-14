<?php 
	$connection = new mysqli("localhost", "root", "", $db_name);
	if ($connection->connect_error) {
		die("Connection is failed:". $connection->connect_error);
	}
?>