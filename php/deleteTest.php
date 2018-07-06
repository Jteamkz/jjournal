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
    $str = "DELETE FROM tests WHERE id = ".$id;
    $str2 = "DELETE FROM relation_gt WHERE test_id =".$id;
	$str3 = "DELETE FROM questions WHERE ids =".$id;
	$str4 = "DELETE FROM relation_st WHERE id_test =".$id;

if ($connection->query($str) === TRUE) {
	$sql = "SELECT * FROM questions WHERE ids = ".$id;
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$str5 = "DELETE FROM variant WHERE ids =".$row['id'];
			$connection->query($str5);
		}
	}
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