<?php 
function getAllData($table_name, $connection){

	$sql = "SELECT * FROM ".$table_name;

	$result = $connection->query($sql);	
	return $result;
}
?>