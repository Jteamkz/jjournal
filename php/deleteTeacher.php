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
    $str = "DELETE FROM teacher WHERE id = ".$id;
    $str2 = "DELETE FROM relation_ts WHERE id_t = ".$id;
    $str3 = "DELETE FROM users WHERE iin = '".$iin."'";
	
if ($connection->query($str) === TRUE) {
    if($connection->query($str2) === TRUE){

    }else{
        exit("ERROR".$connection->error);
    }
}else{
    exit("ERROR".$connection->error);
}
	$cuni->query($str3);
$connection->close();
?>