<?php
session_start();
$db_name = $_SESSION['studycenter'];
include 'db/connect_db.php';
include 'db/get_all_data.php';
include 'connectOS.php';
$connection->set_charset("utf8");
$shady = $_GET['shady'];
$izno = $_GET['izno'];
$password = mysqli_real_escape_string($connection, $_POST['password']);
$firstname = mysqli_real_escape_string($connection, $_POST['name']);
$lastname = mysqli_real_escape_string($connection, $_POST['surname']);
$fathername = mysqli_real_escape_string($connection, $_POST['fathername']);
$phone = mysqli_real_escape_string($connection, $_POST['tele']);
$iin = mysqli_real_escape_string($connection, $_POST['iin']);
$phone_parent = mysqli_real_escape_string($connection, $_POST['tele_rod']);
$payday = mysqli_real_escape_string($connection, $_POST['payday']);
$birthday = mysqli_real_escape_string($connection, $_POST['birthday']);

if (isset($_POST['checkboxname'])) {
	$groups = $_POST['checkboxname'];
}else{
	$groups = array();
}
$id = $_POST['id'];
$update_query_groups = "DELETE FROM relation_cs WHERE student_id = '$id'";
$id_groups = array();
for ($d=0; $d < sizeof($groups); $d++) { 
	$poki = $groups[$d];
	$query_single = "SELECT id FROM class WHERE name_group = '$poki'";
	$tempo = $connection->query($query_single);
	$pompei = $tempo->fetch_assoc();
	$id_groups[$d] = $pompei['id'];
}
$zivert = false;

if ($connection->query($update_query_groups) === TRUE) {
	$boolean_update1 = "UPDATE student SET bool = 'true' WHERE id = $id";
	$connection->query($boolean_update1);
	for ($g=0; $g < sizeof($groups); $g++) { 
		$temp_id = $id_groups[$g];
		$insertion = "INSERT INTO relation_cs (class_id, student_id) VALUES ('$temp_id', '$id')";
		$boolean_update = "UPDATE student SET bool = 'false' WHERE id = $id";
		$connection->query($boolean_update);
		if ($connection->query($insertion) === TRUE) {
			continue;
		}else{
			exit("INSERTION ERROR GROUPS");
			break;
		}
	}
	if(sizeof($groups) == 0){
		$boolean_update = "UPDATE student SET bool = 'true' WHERE id = $id";
		$connection->query($boolean_update);
	}
}

$update_query = "UPDATE student SET firstname = '$firstname', lastname = '$lastname', fathername = '$fathername', phone = '$phone', iin = '$iin', phone_parent = '$phone_parent', birthday = '$birthday' WHERE iin = '$izno'";


$connection2 = new mysqli("localhost", "root", "", "databases");
    if ($connection2->connect_error) {
        die("Connection2 is failed:". $connection2->connect_error);
    }
$update_query2 = "UPDATE users SET iin = '$iin', tele = '$phone' WHERE iin = '$izno'";



if ($connection->query($update_query) === TRUE && $cuni->query($update_query2) === TRUE) {
}
$connection->close();
?>