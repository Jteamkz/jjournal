<?php 
	session_start();
	$db_name = $_SESSION['studycenter'];

	include '../php/SQLconnect.php';
	include '../php/connectOS.php';
	
	$array = $_GET['array'];
	$rights = 0;
	$numberquests = $_GET['numberquests'];
	$numberAns = "";
	$idTest = $_POST['testId'];
	$i = 0;
			
			for($j = 0; $j < strlen($array); $j++){
				
			if($array[$j] == ','){
					$question = $_POST["vopros".$i];
					$answers = array();
					$answersGiven = array();
					$sql = "SELECT * FROM variant WHERE ids='$question' AND bool = 1";
					$result = $con->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							array_push($answers, $row['id']);
						}
					}
					
				for($k = 0; $k < $numberAns; $k++){
					$variant = $_POST['answer'.$i.$k];
					if($variant!=null)
						array_push($answersGiven, $variant);
				}
				$RightOrWrong = true;
				
				sort($answers);
				sort($answersGiven);
				if ($answers!=$answersGiven){
					$RightOrWrong = false;
				}
				/*foreach($answers as $result) {
					echo $result.",";
				}
				echo "   ";
				foreach($answersGiven as $result) {
					echo $result.",";
				}*/
				if($RightOrWrong == true)
						$rights++;
				$numberAns = "";
				$i++;
			}else{
				$numberAns = $numberAns + $array[$j];
			}
		}
		$idStudent = $_SESSION['iin'];
		
		$sql9 = "SELECT id FROM student WHERE iin = '$idStudent'";
			$result9 = $con->query($sql9);

			if ($result9->num_rows > 0) {
				// output data of each row
				while($row9 = $result9->fetch_assoc()) {
					$student_id = $row9['id'];
				}
		}
		
		$sql1 = "SELECT * FROM relation_st WHERE id_student = '$student_id' AND id_test = '$idTest'";
		$result1 = $con->query($sql1);
		$isExamined = false;
		if ($result1->num_rows > 0) {
			$isExamined = true;
		}
		if($isExamined == false){
			
			$sql = "INSERT INTO relation_st (id_student, id_test, points) VALUES ('$student_id', '$idTest', '$rights')";
			
			if ($con->query($sql) === TRUE) {
				echo "Ты набрал: ".$rights." <a href='../student_panel.php'>Назад</a>";
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
			
		}else{
			echo "eee onbagan";
		}
?>
