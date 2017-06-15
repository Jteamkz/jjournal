<?php
		session_start();
		$db_name = $_SESSION['studycenter'];
		include "../php/SQLconnect.php";
		include "../php/connectOS.php";
		$name = $_POST["name"];
		$subject = $_POST["subject"];
		$name = $_POST["name".$i];
		$teacher = $_POST["teacher"];
		$monday = $_POST["monday1"]." ".$_POST["monday2"]." ".$_POST["mondayroom"];
		$tuesday = $_POST["tuesday1"]." ".$_POST["tuesday2"]." ".$_POST["tuesdayroom"];
		$wednesday = $_POST["wednesday1"]." ".$_POST["wednesday2"]." ".$_POST["wednesdayroom"];
		$thursday = $_POST["thursday1"]." ".$_POST["thursday2"]." ".$_POST["thursdayroom"];
		$friday = $_POST["friday1"]." ".$_POST["friday2"]." ".$_POST["fridayroom"];
		$saturday = $_POST["saturday1"]." ".$_POST["saturday2"]." ".$_POST["saturdayoom"];
		$sunday = $_POST["sunday1"]." ".$_POST["sunday2"]." ".$_POST["sundayroom"];
		
		if($_POST['checkbox']){
			$students = join(',',$_POST['checkbox']);
			$sql = "UPDATE student SET bool='false' WHERE id IN(".$students.")";

			if ($con->query($sql) === TRUE) {

			} else {
			    echo "Kulager: " . $conn->error;
			}
		}
		$sql = "INSERT INTO schedule (monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES ('$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday')";

		if ($con->query($sql) === TRUE) {
			$last_id = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

		$sql = "INSERT INTO class (name_group, subject, teacher_id, schedule) VALUES ('$name', '$subject', '$teacher', '$last_id')";

		if ($con->query($sql) === TRUE) {
			$lastik = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		
		$students = $students.",";
		$size = strlen($students);
		$idiwka = "";

		for($i = 0; $i < $size; $i++){
			
			if($students[$i] == ','){
				$sql = "INSERT INTO relation_cs (class_id, student_id) VALUES ('$lastik','$idiwka')";

				if ($con->query($sql) === TRUE) {
					
				} else {
					
			    	echo "EKuma: " . $conn->error;
				}
				$idiwka = "";

			}else{
				
				$idiwka = $idiwka.$students[$i];

			}
		}
		echo "<script>window.location = '../admin_panel.php'</script>";
		
?>