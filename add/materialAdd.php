<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	
	$img_dir = "../material/";
	$group_id = $_GET['group_id'];
	$name = $_GET['name'];
	
	$temp = explode(".", $_FILES["file"]["name"]);
	$img = $img_dir . round(microtime(true)) . '.' . end($temp);
	$upload_img = "material/".round(microtime(true)) . '.' . end($temp);
	
	move_uploaded_file($_FILES["file"]["tmp_name"], $img);
	
	$sql = "INSERT INTO materials (link, name, group_id) VALUES('$upload_img', '$name', $group_id)";

	if ($con->query($sql) === TRUE) {
		
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
?>