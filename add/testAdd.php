<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
		$n = $_GET['numbervopros'];
		$name = $_POST["name"];
		$description = $_POST["description"];
		
		$sql = "INSERT INTO tests (name, description) VALUES ('$name', '$description')";

		if ($con->query($sql) === TRUE) {
		    $kongo = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

	for($i = 0; $i <= $n; $i++){
		$question = $_POST["vopros".$i];
		$right = $_POST["right".$i];
		$wrong0 = $_POST["wrong".$i."0"];
		$wrong1 = $_POST["wrong".$i."1"];
		$wrong2 = $_POST["wrong".$i."2"];

		$sql = "INSERT INTO questions (question, rightanswer, wrong0, wrong1, wrong2, ids) VALUES ('$question', '$right', '$wrong0', '$wrong1', '$wrong2', '$kongo')";

		if ($con->query($sql) === TRUE) {
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
	
?>