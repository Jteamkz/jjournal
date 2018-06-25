<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	
	$id_okushy = $_SESSION['id'];
	$old_pass = mysqli_real_escape_string($con, $_POST['oldpass']);
	$new_pass = mysqli_real_escape_string($con, $_POST['newpass']);
	$rep_new_pass = mysqli_real_escape_string($con, $_POST['repnewpass']);
	$table_name = mysqli_real_escape_string($con, $_POST['table']);
	
	$sql = "SELECT * FROM $table_name WHERE id = $id_okushy";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$iin = $row['iin'];
		}
	}
	
	$sql2 = "SELECT * FROM users WHERE iin = $iin";
	$result2 = $cuni->query($sql2);

	if ($result2->num_rows > 0) {
		// output data of each row
		while($row2 = $result2->fetch_assoc()) {
			if($row2['password'] == $old_pass && $new_pass == $rep_new_pass){
				$sql = "UPDATE users SET password = '$new_pass' WHERE iin = $iin";

				if ($cuni->query($sql) === TRUE) {
					echo "Ваш пароль успешно изменен";
				}
				
			}else{
				echo "Пароли не совпадают или ваш старый пароль введен не правильно";
			}
		}
	}
?>