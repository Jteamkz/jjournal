<?php 
    session_start();
    $db_name = $_SESSION['studycenter'];
    include 'db/connect_db.php';
    include 'db/get_all_data.php';
	include 'SQLconnect.php';
    $connection->set_charset("utf8");
    $id = $_GET['id'];
	$schedule_id = $_GET['schedule_id'];
    if(!isset($id)){
        echo "FUCK";
    }
    $str = "DELETE FROM class WHERE id = ".$id;
    $str2 = "DELETE FROM relation_cs WHERE class_id = ".$id;
	$str3 = "DELETE FROM relation_gt WHERE group_id = ".$id;
	$str4 = "DELETE FROM schedule WHERE id = ".$schedule_id;
	$sql5 = "SELECT * FROM lessons WHERE group_id = ".$id;
	$result = $con->query($sql5);
					
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$lesson_id = $row['id'];
			$str5 = "DELETE FROM attendance WHERE lesson_id = ".$lesson_id;
			$con->query($str5);
			$str6 = "DELETE FROM lessons WHERE id = ".$lesson_id;
			$con->query($str6);
		}
	}
    
if ($connection->query($str) === TRUE) {
    if($connection->query($str2) === TRUE){

    }
	if($connection->query($str3) === TRUE){

    }
	if($connection->query($str4) === TRUE){

    }
}else{
    exit("ERROR".$connection->error);
}

$connection->close();
?>