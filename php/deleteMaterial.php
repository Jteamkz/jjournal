<?php 
    session_start();
    $db_name = $_SESSION['studycenter'];
    include 'db/connect_db.php';
    include 'db/get_all_data.php';
    $connection->set_charset("utf8");
    $id = $_GET['id'];
	$link = $_GET['link'];
	
    if(!isset($id)){
        echo "FUCK";
    }
    $str = "DELETE FROM materials WHERE id = ".$id;

	if ($connection->query($str) === TRUE) {
		unlink('../'.$link);
	}else{
		exit("ERROR".$connection->error);
	}

	$connection->close();
?>