<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "php/SQLconnect.php";
	include "php/connectOS.php";
	
	$sql = "SELECT * FROM tests";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
			echo "<a href='add/testPage.php?id=".$row['id']."'>".$row['name']."</a><br>";   	
	    }
	}else{
		echo "sad";
	}
	?>