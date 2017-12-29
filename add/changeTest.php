<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	
	$idTest = $_GET['test_id'];
	
	if(!empty($_POST['checkboxname'])) {
		foreach($_POST['checkboxname'] as $check) {
			$sql = "INSERT INTO relation_gt VALUES ('', $idTest, $check)";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
?>