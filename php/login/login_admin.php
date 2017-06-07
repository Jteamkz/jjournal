<?php 
session_start();

if (isset($_POST['admin'])) {$admin = $_POST['admin']; if ($admin == '') { unset($admin);} }
if (isset($_POST['password'])) {$password = $_POST['password']; if ($password == '') { unset($password);} }
if (!isset($admin) || !isset($password) || !isset($_GET['id'])) {
	exit("Error");
}
$id = $_GET['id'];

include '../db/get_all_db.php';

$database_name = mysql_query("SELECT * FROM database_list WHERE id = '".$id."'", $list);

while ($row_name = mysql_fetch_assoc($database_name)) {
	$export_db_name = $row_name['database_name'];
}

include '../db/db.php';

$admin_datas = mysql_query("SELECT * FROM admin WHERE id = '1'", $db);
$admin_data = mysql_fetch_assoc($admin_datas);

if (($admin == $admin_data['login']) && ($password == $admin_data['password'])) {
	
	$to_admin = 'Location: ../../admin_panel.php';
	$_SESSION['studycenter'] = $export_db_name;
	header($to_admin);
} else {
	echo "False";
}
?>