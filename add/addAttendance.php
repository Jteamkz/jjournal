<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	
	$group_id = $_POST['group_id'];
	$lesson_id = $_POST['lesson_id'];
	$name_group = $_POST['name_group'];
	
	$sql = "SELECT * FROM relation_cs WHERE class_id = $group_id";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$student_id = $row['student_id'];
			$bool = $_POST['attendance'.$student_id];
			$sql1 = "INSERT INTO attendance(lesson_id, student_id, bool) VALUES($lesson_id, $student_id, '$bool')";

			$con->query($sql1);
		}
	}
	
	$sql2 = "UPDATE lessons SET isset = 'yes' WHERE id = $lesson_id";

	if ($con->query($sql2) === TRUE) {
		header("Location: ../admin_attendance_days.php?id=$group_id&name_group=$name_group");
	} else {
	   echo "Error: " . $sql2 . "<br>" . $con->error;
	}
?>