<?php
session_start();
session_destroy();
session_start();
if (isset($_POST['user_name'])) {$user_name = $_POST['user_name']; if ($user_name == '') { unset($user_name);} }
if (isset($_POST['password'])) {$password = $_POST['password']; if ($password == '') { unset($password);} }
if (!isset($user_name) || !isset($password)) {
	//exit("Error");
}

include '../db/get_all_db.php';
include '../db/get_query.php';
$sql = "SELECT * FROM users WHERE iin = '".$user_name."' OR tele = '".$user_name."'";
unset($_SESSION['iin']);
unset($_SESSION['tele']);
unset($_SESSION['isStudent']);
unset($_SESSION['isTeacher']);
$result = $conn->query($sql);	

if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	if ($row['password'] == $password) {
		$export_db_name = $row['database_name'];
		if ($row['status'] == 'admin') {
			$to_admin = 'admin';
			$_SESSION['studycenter'] = $export_db_name;
			echo $to_admin;
		}else if($row['status'] == 'student'){
			$_SESSION['isStudent'] = true;
			$_SESSION['isTeacher'] = false;
			if(strlen($user_name) > 11){
				$to_admin = "student";
				//?iin=".$row['iin']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['iin'] = $row['iin'];
			}else{
				$to_admin = "student";
				//?tele=".$row['tele']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['tele'] = $row['tele'];
			}

			$_SESSION['isStudent'] = true;
			
			echo $to_admin;
		}else if($row['status'] == 'teacher'){
			$_SESSION['isStudent'] = false;
			$_SESSION['isTeacher'] = true;
			if(strlen($user_name) > 11){
				$to_admin = "teacher";
				//?iin=".$row['iin']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['iin'] = $row['iin'];
			}else{
				$to_admin = "teacher";
				//?tele=".$row['tele']
				$_SESSION['studycenter'] = $export_db_name;
				$_SESSION['tele'] = $row['tele'];
			}
			// 87051581895
			// 998877665544
			echo $to_admin;
		}
		
	}else{
		echo "False";
	}
}else{
	echo "False";
}
?>