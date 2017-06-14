<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	$n = $_GET['numberTeacher'];
	for($i = 0; $i < $n; $i++){
		$IIN = $_POST["IIN".$i];
		$password = $_POST["password".$i];
		$name = $_POST["name".$i];
		$surname = $_POST["surname".$i];
		$father = $_POST["father".$i];
		$birthday = $_POST["birthday".$i];
		$phone = $_POST["phone".$i];
		$sql = "INSERT INTO teachers (IIN, password, name, surname, father, birthday, phone) VALUES ('$IIN', '$password', '$name', '$surname', '$father', '$birthday', '$phone')";

		if ($con->query($sql) === TRUE) {
		    echo "New record created successfully";
		    echo "<script>window.location = '../admin_panel.php'</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
			}
?>