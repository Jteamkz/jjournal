<?php
	include "../php/SQLconnect.php";
	$n = $_GET['numberStudent'];
	for($i = 0; $i < $n; $i++){
		$IIN = $_POST["IIN".$i];
		$password = $_POST["password".$i];
		$name = $_POST["name".$i];
		$surname = $_POST["surname".$i];
		$father = $_POST["father".$i];
		$birthday = $_POST["birthday".$i];
		$phone = $_POST["phone".$i];
		$sql = "INSERT INTO students (IIN, password, name, surname, father, birthday, phone, bool) VALUES ('$IIN', '$password', '$name', '$surname', '$father', '$birthday', '$phone', 'true')";

		if ($con->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
			}
?>