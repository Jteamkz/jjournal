<?php
		session_start();
		$db_name = $_SESSION['studycenter'];
		include "../php/SQLconnect.php";
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
			$sql = "UPDATE students SET bool='false' WHERE id IN(".$students.")";

			if ($con->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}
		$sql = "INSERT INTO schedules (monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES ('$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday')";

		if ($con->query($sql) === TRUE) {
			$last_id = $con->insert_id;
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		$students = $students.",";
		$sql = "INSERT INTO groups (name, subject, teacher, students, schedule) VALUES ('$name', '$subject', '$teacher', '$students', '$last_id')";

		if ($con->query($sql) === TRUE) {
		    echo "New record created successfully";
		    echo "<script>window.location = '../admin_panel.php'</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
?>