<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	$n = $_GET['numberStudent'];
	
	for($i = 0; $i <= $n; $i++){
		$IIN = mysqli_real_escape_string($con, $_POST["IIN".$i]);
		$password = mysqli_real_escape_string($con, $_POST["password".$i]);
		$name = mysqli_real_escape_string($con, $_POST["name".$i]);
		$surname = mysqli_real_escape_string($con, $_POST["surname".$i]);
		$father = mysqli_real_escape_string($con, $_POST["father".$i]);
		$birthday = mysqli_real_escape_string($con, $_POST["birthday".$i]);
		$phone = mysqli_real_escape_string($con, $_POST["phone".$i]);
		$phoneparent = mysqli_real_escape_string($con, $_POST["phoneparent".$i]);
		$payday = mysqli_real_escape_string($con, $_POST["payday".$i]);

		$sql = "INSERT INTO users (iin, tele, password, database_name, status) VALUES ('$IIN', '$phone', '$password', '$db_name', 'student')";

		if ($cuni->query($sql) === TRUE) {

		} else {
		    echo "Error: " . $sql . "<br>" . $cuni->error;
		}
		
		$sql = "INSERT INTO student (IIN, firstname, lastname, fathername, birthday, phone, bool, phone_parent) VALUES ('$IIN', '$name', '$surname', '$father', '$birthday', '$phone', 'true', '$phoneparent')";

		if ($con->query($sql) === TRUE) {
		    echo "<script>window.location = '../admin_panel.php'</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
?>