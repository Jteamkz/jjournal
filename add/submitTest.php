<?php
	$array = $_GET['array'].",";
	$numberquests = $_GET['numberquests'];
	$numberAns = "";
	$i = 0;
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
		$name = $_POST["name"];
		$description = $_POST["description"];
		
		$sql = "INSERT INTO tests (name, description, array, numberquests) VALUES ('$name', '$description', '$array', '$numberquests')";

		if ($con->query($sql) === TRUE) {
		    $kongo = $con->insert_id;
		}

		for($j = 0; $j < strlen($array); $j++){
			if($array[$j] == ','){
				$question = $_POST["vopros".$i];
				
				$sql = "INSERT INTO questions (question, ids) VALUES ('$question', '$kongo')";

				if ($con->query($sql) === TRUE) {
				    $kongo2 = $con->insert_id;
				}
				for($k = 0; $k < $numberAns; $k++){
					if(isset($_POST['answer'.$i.$k])){
						$variant = $_POST['answer'.$i.$k];
						$sql = "INSERT INTO variant (content, ids, bool) VALUES ('$variant', '$kongo2', 1)";

						if ($con->query($sql) === TRUE) {
						    
						}
					}else{
						$variant = $_POST['answerZamena'.$i.$k];
						$sql = "INSERT INTO variant (content, ids, bool) VALUES ('$variant', '$kongo2', 0)";

						if ($con->query($sql) === TRUE) {
						    
						}
					}
				}
				$numberAns = "";
				$i++;
			}else{
				$numberAns = $numberAns + $array[$j];
			}
		}
		if($_SESSION['isTeacher'] == true)
			header("Location: ../teacher_tests.php");
		else
			header("Location: ../admin_tests.php");
?>