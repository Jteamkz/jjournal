<?php 
function get_data($fld, $table_name, $connection){

	$size = sizeof($fld);
	$fields = "";
	if ($size == 1) {
		$fields = $fld[0];
	}else{
		for ($i=0; $i < $size; $i++) { 
			$fields = $fields . "," . $fld[$i];
		}
		$fields = ltrim($fields, ',');
	}

	$sql = "SELECT ".$fields." FROM ".$table_name;

	$result = $connection->query($sql);	
	return $result;
}
?>