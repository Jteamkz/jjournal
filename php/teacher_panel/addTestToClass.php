<?php
session_start();
$db_name = $_SESSION['studycenter'];
include '../db/connect_db.php';
include '../db/get_all_data.php';
include '../db/get.php';
include '../db/get_query.php';

    $connection->set_charset("utf8");

$test_id = $_POST['test'];
$class_id = $_POST['group'];

$query = "INSERT INTO relation_test_class (id_test, id_class) VALUES ('".$test_id."', '".$class_id."')";

if($connection->query($query) === TRUE){
    
}else{
    echo "error";
}

?>