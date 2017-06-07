<?php 
error_reporting(0);
$link = mysql_connect('localhost', 'root', '');
$res = mysql_query("SHOW DATABASES");

while ($row = mysql_fetch_assoc($res)) {
    $databases[] = $row['Database'] . "\n";
}

$list = mysql_connect('localhost', 'root', '');
Mysql_select_db("databases",$list);
?>