<?php 
function insert_data($data, $fld, $table_name, $connection){

	$size = sizeof($fld);
	$fields = "";
	$datas = "";
	for ($i=0; $i < $size; $i++) { 
		$fields = $fields . "," . $fld[$i];
		$datas = $datas . "'" . $data[$i] . "',";
	}
	$fields = ltrim($fields, ',');
	$datas = rtrim($datas, ',');

	$sql = "INSERT INTO $table_name (".$fields.") VALUES (".$datas.")";

	if ($connection->query($sql) == TRUE) {
		header('Loaction: ../admin_panel.php');
	}else{	
		echo "Error <a href='../admin_panel.php'>Назад</a>".$connection->error;
	}
}
?>