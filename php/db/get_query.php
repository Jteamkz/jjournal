<?php 

function get_query($query, $table_name, $connection)
{
	$sql = "SELECT * FROM ".$table_name." WHERE ".$query;

	$result = $connection->query($sql);	
	return $result;
}

?>