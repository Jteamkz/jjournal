<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	$n = $_GET['numberStudent'];
	
	for($i = 0; $i <= $n; $i++){
		$IIN = $_POST["IIN".$i];
		$password = $_POST["password".$i];
		$name = $_POST["name".$i];
		$surname = $_POST["surname".$i];
		$father = $_POST["father".$i];
		$birthday = $_POST["birthday".$i];
		$phone = $_POST["phone".$i];
		$phoneparent = $_POST["phoneparent".$i];
		$payday = $_POST["payday".$i];

		$sql = "INSERT INTO users (iin, tele, password, database_name, status) VALUES ('$IIN', '$phone', '$password', '$db_name', 'student')";

		if ($cuni->query($sql) === TRUE) {

		} else {
		    echo "Error: " . $sql . "<br>" . $cuni->error;
		}
		
		$sql = "INSERT INTO student (IIN, firstname, lastname, fathername, birthday, phone, bool, phone_parent, payday) VALUES ('$IIN', '$name', '$surname', '$father', '$birthday', '$phone', 'true', '$phoneparent', '$payday')";

		if ($con->query($sql) === TRUE) {
		    echo "<script>window.location = '../admin_panel.php'</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
?>