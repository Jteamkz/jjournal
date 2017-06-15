<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	$n = $_GET['numberTeacher'];
	for($i = 0; $i < $n; $i++){
		$IIN = $_POST["IIN".$i];
		$password = $_POST["password".$i];
		$name = $_POST["name".$i];
		$surname = $_POST["surname".$i];
		$father = $_POST["father".$i];
		$birthday = $_POST["birthday".$i];
		$phone = $_POST["phone".$i];
		$subject = $_POST["subject".$i];

		$sql = "INSERT INTO users (iin, password, status, database_name, tele) VALUES ('$IIN', '$password', 'teacher', '$db_name', '$phone')";

		if ($cuni->query($sql) === TRUE) {
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $cuni->error;
		}

		$sql = "INSERT INTO teacher (IIN, firstname, lastname, fathername, birthday, telephone) VALUES ('$IIN', '$name', '$surname', '$father', '$birthday', '$phone')";

		if ($con->query($sql) === TRUE) {
		    $lastik = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

		$sql = "INSERT INTO relation_ts (id_t, id_s) VALUES ('$lastik', '$subject')";

		if ($con->query($sql) === TRUE) {
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
	echo "<script>window.location = '../admin_panel.php'</script>";
?>