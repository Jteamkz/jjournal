<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	$n = $_GET['numberSubject'];
	for($i = 0; $i <= $n; $i++){
		$name = $_POST["name".$i];
		$defenition = $_POST["defenition".$i];
		$sql = "INSERT INTO subjects (name, description) VALUES ('$name', '$defenition')";

		if ($con->query($sql) === TRUE) {
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
			}
?>