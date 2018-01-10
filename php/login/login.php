<?php 
session_start();

if (isset($_POST['user_name'])) {$user_name = $_POST['user_name']; if ($user_name == '') { unset($user_name);} }
if (isset($_POST['password'])) {$password = $_POST['password']; if ($password == '') { unset($password);} }
if (!isset($user_name) || !isset($password)) {
	exit("Error");
}

include '../db/get_all_db.php';
include '../db/get_query.php';
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
			if(strlen($user_name) > 11){
				$to_admin = "Location: ../../student_panel.php";
				//?iin=".$row['iin']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['iin'] = $row['iin'];
			}else{
				$to_admin = "Location: ../../student_panel.php";
				//?tele=".$row['tele']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['tele'] = $row['tele'];
			}

			$_SESSION['isStudent'] = true;

			header($to_admin);
		}else if($row['status'] == 'teacher'){
			$_SESSION['isStudent'] = false;
			if(strlen($user_name) > 11){
				$to_admin = "Location: ../../teacher_panel.php";
				//?iin=".$row['iin']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['iin'] = $row['iin'];
			}else{
				$to_admin = "Location: ../../teacher_panel.php";
				//?tele=".$row['tele']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['tele'] = $row['tele'];
			}
			// 87051581895
			// 998877665544
			header($to_admin);
		}
		
	}else{
		echo "False2";
	}
}else{
	echo "False1";
}
?>