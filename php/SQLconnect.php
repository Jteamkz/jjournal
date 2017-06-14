<?php
	$username = "root";
	$password = "";
	$con = new mysqli("localhost", $username, $password, $db_name);
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}
?>