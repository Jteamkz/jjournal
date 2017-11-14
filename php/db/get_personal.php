<?php 
if(isset($iin_b) && $iin_b){
    $query = "iin=".$iin_b;
}else if(isset($iin_b) && !$iin_b){
    $query = "telephone=".$tele;
}else if(isset($_SESSION['iin'])){
    $query = "iin=".$iin;
}
$base_response = get_query($query, 'teacher', $connection);

if (!$base_response) {
    trigger_error('Invalid query: ' . $connection->error);
}else{
    $personal = $base_response->fetch_assoc();
}

?>