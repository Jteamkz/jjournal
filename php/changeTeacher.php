<?php 

session_start();

$db_name = $_SESSION['studycenter'];
include 'db/connect_db.php';
include 'db/get_all_data.php';
include 'db/get.php';
include 'db/get_query.php';

$connection->set_charset("utf8");

$shady = $_GET['shady'];

$izno = $_GET['izno'];



$firstname = mysqli_real_escape_string($connection, $_POST['name']);
$lastname = mysqli_real_escape_string($connection, $_POST['surname']);
$fathername = mysqli_real_escape_string($connection, $_POST['fathername']);
$phone = mysqli_real_escape_string($connection, $_POST['tele']);

$iin = mysqli_real_escape_string($connection, $_POST['iin']);
$birthday = mysqli_real_escape_string($connection, $_POST['birthday']);

$password = mysqli_real_escape_string($connection, $_POST['password']);

$id = $_POST['id'];
$group_subjects = array();
$groups = array();
if (isset($_POST['checkboxname'])) {
	$groups = $_POST['checkboxname'];

    for ($h=0; $h < sizeof($groups); $h++) { 
        $temp_name = $groups[$h];
        $subjectAlu = "SELECT subject FROM class WHERE name_group = '$temp_name'";

        $tezis = $connection->query($subjectAlu);
            $pomp = $tezis->fetch_assoc();
            $group_subjects[$h] = $pomp['subject'];
    }
}else{
	$groups = array();
}
if (isset($_POST['checkboxnames'])) {
    $subjects = $_POST['checkboxnames'];
}else{
    $subjects = array();
}

$update_query_groups = "UPDATE class SET teacher_id = NULL WHERE teacher_id = ".$id."";

$id_groups = array();

if ($connection->query($update_query_groups) === TRUE) {
    
    

    // $group_ids = array();
    // for ($b=0; $b < sizeof($groups); $b++) { 
    //     $huntkey = $groups[$b];
    //     $papitoo = "SELECT id FROM class WHERE name_group = '$huntkey'";
    //     $baby = $connection->query($papitoo);
    //     $mineup = $baby->fetch_assoc();
    //     $group_ids[$b] = $mineup['id'];
    // }
    // for ($b=0; $b < sizeof($groups); $b++) { 
    //     $huntkey = $group_ids[$b];
    //     $papitoo = "DELETE FROM class WHERE id = '$huntkey'";
    //     if ($connection->query($papitoo) === TRUE) {
    //         continue;
    //     }else{
    //         exit("Error in deleting groups, something gone wrong");
    //     }
    // }
    // $checker = 0;

    for ($d=0; $d < sizeof($groups); $d++) { 
        $poki = $groups[$d];
        $kongo = "UPDATE class SET teacher_id = '$id' WHERE name_group = '$poki'";
        
        $connection->query($kongo);


        // $poki = $groups[$d];
        // $garry = $group_subjects[$d];
        // $temp_id_group = $group_ids[$d];
        
        // $query_single = "INSERT INTO class (id ,name_group, teacher_id, subject) VALUES ('$temp_id_group' ,'$poki', '$id', '$garry')";
        // if ($connection->query($query_single) === TRUE) {
        //     $checker++;
        //     continue;
        // }else{
        //     exit("Error in instertiong to the groups");
        // }
    }

}else{
    exit($connection->error);
}


$delete_realtion = "DELETE FROM relation_ts WHERE id_t = '$id'";
$id_subjects= array();
// print_r($subjects);
for ($d=0; $d < sizeof($subjects); $d++) { 
    $poki = $subjects[$d];
    $query_single = "SELECT id FROM subjects WHERE  name = '$poki'";
    $tempo = $connection->query($query_single);
    
    $pompei = $tempo->fetch_assoc();
    $id_subjecti[$d] = $pompei['id'];
}

if ($connection->query($delete_realtion) === TRUE) {
	for ($g=0; $g < sizeof($subjects); $g++) { 
		$temp_id = $id_subjecti[$g];
		$insertion = "INSERT INTO relation_ts (id_t, id_s) VALUES ('$id', '$temp_id')";
		
		if ($connection->query($insertion) === TRUE) {
			continue;
		}else{
			exit("INSERTION ERROR GROUPS");
			break;
		}
	}
}


$update_query = "UPDATE teacher SET firstname = '$firstname', lastname = '$lastname', fathername = '$fathername', telephone = '$phone', iin = '$iin', birthday = '$birthday' WHERE iin = '$izno'";

if ($connection->query($update_query) === TRUE) {
    
} else {
    echo "Error updating record: " . $connection->error;
}
$update_query_inAll = "UPDATE users SET iin = '$iin', tele = '$phone' WHERE iin = '$izno'";

include 'db/get_all_db.php';

if($conn->query($update_query_inAll) === TRUE){

}else{
    echo "Error updating record in All:".$conn->error;
}
$conn->close();
$connection->close();
?>