<?php 
	$conn = new mysqli("localhost", "root", "", "databases");
	if ($conn->connect_error) {
		die("Connection is failed:". $connection->connect_error);
	}
?>