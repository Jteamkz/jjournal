<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	$group_id = $_POST['group_id'];
	$name = $_POST["name"];
	
	$sql = "INSERT INTO lessons (group_id, name, isset) VALUES ($group_id, '$name','not')";

	if ($con->query($sql) === TRUE) {
    
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}
?>