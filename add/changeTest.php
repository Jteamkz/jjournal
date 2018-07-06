<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	
	$idTest = $_GET['test_id'];
	
	$sql_for_all = "DELETE FROM relation_gt WHERE test_id = $idTest";
	$con->query($sql_for_all);
	
	if($_POST['checkboxname']){
		$checkboxes = join(',',$_POST['checkboxname']);
	}
	if(!empty($_POST['checkboxname'])) {
		foreach($_POST['checkboxname'] as $check) {
			$sql = "INSERT INTO relation_gt (test_id, group_id) VALUES ($idTest, $check)";
			
			$con->query($sql);
		}
	}
	
?>