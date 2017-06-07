<?php 
	$connection = new mysqli("localhost", "root", "", "studycenter");
	if ($connection->connect_error) {
		die("Connection is failed:". $connection->connect_error);
	}
?>