<?php
if(isset($iin_b) && $iin_b){
    $query = "iin=".$iin_b;
}else if(isset($iin_b) && !$iin_b ){
    if(!$_SESSION['isStudent']){
        $query = "telephone=".$tele;
    }else{
        $query = "phone=".$tele;
    }
}else if(isset($_SESSION['iin'])){
    $query = "iin=".$iin;
}

if(!$_SESSION['isStudent']){
    $base_response = get_query($query, 'teacher', $connection);
}else{
    $base_response = get_query($query, 'student', $connection);
}
//echo $query;

if (!$base_response) {
    //trigger_error("Invalid query: " . $connection->error);
}else{
    $personal = $base_response->fetch_assoc();
}

?>