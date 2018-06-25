<?php 
	include 'connectOS.php';
    session_start();
    $db_name = $_SESSION['studycenter'];
    include 'db/connect_db.php';
    include 'db/get_all_data.php';
    $connection->set_charset("utf8");
    $id = $_GET['id'];
	$iin = mysqli_real_escape_string($connection, $_GET['iin']);
    if(!isset($id)){
        echo "FUCK";
    }
    $str = "DELETE FROM student WHERE id = ".$id;
    $str2 = "DELETE FROM relation_cs WHERE student_id =".$id;
	$str3 = "DELETE FROM users WHERE iin = '".$iin."'";

if ($connection->query($str) === TRUE) {
    if($connection->query($str2) === TRUE){

    }else{
        exit("ERROR 2".$connection->error);
    }
}else{
    exit("ERROR".$connection->error);
}
	if($cuni->query($str3)){
		
	}else{
		exit("error 3: ".$cuni->error);
	}
$connection->close();
?>