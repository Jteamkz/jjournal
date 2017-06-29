<?php 
session_start();

if (isset($_POST['user_name'])) {$user_name = $_POST['user_name']; if ($user_name == '') { unset($user_name);} }
if (isset($_POST['password'])) {$password = $_POST['password']; if ($password == '') { unset($password);} }
if (!isset($user_name) || !isset($password)) {
	exit("Error");
}

include '../db/get_all_db.php';

$sql = "SELECT * FROM users WHERE iin = '".$user_name."' OR tele = '".$user_name."'";

$result = $conn->query($sql);	

if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	if ($row['password'] == $password) {
		$export_db_name = $row['database_name'];
		if ($row['status'] == 'admin') {
			$to_admin = 'Location: ../../admin_panel.php';
			$_SESSION['studycenter'] = $export_db_name;
			header($to_admin);
		}else if($row['status'] == 'student'){
			echo 'student';
		}else if($row['status'] == 'teacher'){
			$to_admin = 'Location: ../../teacher_panel.php';
			$_SESSION['studycenter'] = $export_db_name;
			header($to_admin);
		}
		
	}else{
		echo "False2";
	}
}else{
	echo "False1";
}
?>