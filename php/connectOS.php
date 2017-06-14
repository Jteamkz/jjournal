<?php
	$username = "root";
	$password = "";
	$cuni = new mysqli("localhost", $username, $password, "databases");
	if ($cuni->connect_error) {
	    die("Connection failed: " . $cuni->connect_error);
	}
?>