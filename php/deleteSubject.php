<?php 
    session_start();
    $db_name = $_SESSION['studycenter'];
    include 'db/connect_db.php';
    include 'db/get_all_data.php';
    $connection->set_charset("utf8");
    $id = $_GET['id'];
    if(!isset($id)){
        echo "FUCK";
    }
    $str = "DELETE FROM subjects WHERE id = ".$id;
    $str2 = "DELETE FROM relation_ts WHERE id_s =".$id;
	$str3 = "UPDATE class SET subject = NULL WHERE subject=".$id;

if ($connection->query($str) === TRUE) {
    if($connection->query($str2) === TRUE){

    }
	if($connection->query($str3) === TRUE){

    }
}else{
    exit("ERROR".$connection->error);
}

$connection->close();
?>