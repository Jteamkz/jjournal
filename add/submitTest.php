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
		
		$sql = "INSERT INTO tests (name, description) VALUES ('$name', '$description')";

		if ($con->query($sql) === TRUE) {
		    $kongo = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

		for($j = 0; $j < strlen($array); $j++){
			if($array[$j] == ','){
				$question = $_POST["vopros".$i];
				
				$sql = "INSERT INTO questions (question, ids) VALUES ('$question', '$kongo')";

				if ($con->query($sql) === TRUE) {
				    $kongo2 = $con->insert_id;
				} else {
				    echo "Error: " . $sql . "<br>" . $con->error;
				}
				for($k = 0; $k < $numberAns; $k++){
					if(isset($_POST['answer'.$i.$k])){
						$variant = $_POST['answer'.$i.$k];
						$sql = "INSERT INTO rights (rightanswer, ids) VALUES ('$variant', '$kongo2')";

						if ($con->query($sql) === TRUE) {
						    
						} else {
						    echo "Error: " . $sql . "<br>" . $con->error;
						}
					}else{
						$variant = $_POST['answerZamena'.$i.$k];
						$sql = "INSERT INTO wrongs (wrong, ids) VALUES ('$variant', '$kongo2')";

						if ($con->query($sql) === TRUE) {
						    
						} else {
						    echo "Error: " . $sql . "<br>" . $con->error;
						}
					}
				}
				$numberAns = "";
				$i++;
			}else{
				$numberAns = $numberAns + $array[$j];
			}
		}
?>