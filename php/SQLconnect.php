<?php
	$username = "root";
	$password = "";
	$DBname = "jj";
	// Create connection
	$con = new mysqli("localhost", $username, $password, $DBname);

	// Check connection
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}
?>