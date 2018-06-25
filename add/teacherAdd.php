<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	$n = $_GET['numberTeacher'];
	
	for($i = 0; $i <= $n; $i++){
		$IIN = mysqli_real_escape_string($con, $_POST["IIN".$i]);
		$password = mysqli_real_escape_string($con, $_POST["password".$i]);
		$name = mysqli_real_escape_string($con, $_POST["name".$i]);
		$surname = mysqli_real_escape_string($con, $_POST["surname".$i]);
		$father = mysqli_real_escape_string($con, $_POST["father".$i]);
		$birthday = mysqli_real_escape_string($con, $_POST["birthday".$i]);
		$phone = mysqli_real_escape_string($con, $_POST["phone".$i]);
		$subject = mysqli_real_escape_string($con, $_POST["subject".$i]);

		$sql = "INSERT INTO users (iin, password, status, database_name, tele) VALUES ('$IIN', '$password', 'teacher', '$db_name', '$phone')";

		if ($cuni->query($sql) === TRUE) {
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $cuni->error;
		}

		$sql = "INSERT INTO teacher (iin, firstname, lastname, fathername, birthday, telephone) VALUES ('$IIN', '$name', '$surname', '$father', '$birthday', '$phone')";

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