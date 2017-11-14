<?php
		session_start();
		$db_name = $_SESSION['studycenter'];
		include "../php/SQLconnect.php";
		include "../php/connectOS.php";
		$name = $_POST["name"];
		$subject = $_POST["subject"];
		$name = $_POST["name".$i];
		$teacher = $_POST["teacher"];
		$_POST["monday1"] = foo($_POST["monday1"]);
		$_POST["monday2"] = foo($_POST["monday2"]);
		$_POST["monday3"] = foo($_POST["monday3"]);
		$_POST["monday4"] = foo($_POST["monday4"]);
		$_POST["tuesday1"] = foo($_POST["tuesday1"]);
		$_POST["tuesday2"] = foo($_POST["tuesday2"]);
		$_POST["tuesday3"] = foo($_POST["tuesday3"]);
		$_POST["tuesday4"] = foo($_POST["tuesday4"]);
		$_POST["wednesday1"] = foo($_POST["wednesday1"]);
		$_POST["wednesday2"] = foo($_POST["wednesday2"]);
		$_POST["wednesday3"] = foo($_POST["wednesday3"]);
		$_POST["wednesday4"] = foo($_POST["wednesday4"]);
		$_POST["thursday1"] = foo($_POST["thursday1"]);
		$_POST["thursday2"] = foo($_POST["thursday2"]);
		$_POST["thursday3"] = foo($_POST["thursday3"]);
		$_POST["thursday4"] = foo($_POST["thursday4"]);
		$_POST["friday1"] = foo($_POST["friday1"]);
		$_POST["friday2"] = foo($_POST["friday2"]);
		$_POST["friday3"] = foo($_POST["friday3"]);
		$_POST["friday4"] = foo($_POST["friday4"]);
		$_POST["saturday1"] = foo($_POST["saturday1"]);
		$_POST["saturday2"] = foo($_POST["saturday2"]);
		$_POST["saturday3"] = foo($_POST["saturday3"]);
		$_POST["saturday4"] = foo($_POST["saturday4"]);
		$_POST["sunday1"] = foo($_POST["sunday1"]);
		$_POST["sunday2"] = foo($_POST["sunday2"]);
		$_POST["sunday3"] = foo($_POST["sunday3"]);
		$_POST["sunday4"] = foo($_POST["sunday4"]);
		$monday = $_POST["monday1"]." ".$_POST["monday2"]." ".$_POST["monday3"]." ".$_POST["monday4"];
		$tuesday = $_POST["tuesday1"]." ".$_POST["tuesday2"]." ".$_POST["tuesday3"]." ".$_POST["tuesday4"];
		$wednesday = $_POST["wednesday1"]." ".$_POST["wednesday2"]." ".$_POST["wednesday3"]." ".$_POST["wednesday4"];
		$thursday = $_POST["thursday1"]." ".$_POST["thursday2"]." ".$_POST["thursday3"]." ".$_POST["thursday4"];
		$friday = $_POST["friday1"]." ".$_POST["friday2"]." ".$_POST["friday3"]." ".$_POST["friday4"];
		$saturday = $_POST["saturday1"]." ".$_POST["saturday2"]." ".$_POST["saturday3"]." ".$_POST["saturday4"];
		$sunday = $_POST["sunday1"]." ".$_POST["sunday2"]." ".$_POST["sunday3"]." ".$_POST["sunday4"];
		$mr = $_POST['mondayroom'];
		$tur = $_POST['tuesdayroom'];
		$wr = $_POST['wednesdayroom'];
		$thr = $_POST['thursdayroom'];
		$fr = $_POST['fridayroom'];
		$sar = $_POST['saturdayroom'];
		$sur = $_POST['sundayroom'];
		if($_POST['checkbox']){
			$students = join(',',$_POST['checkbox']);
			$sql = "UPDATE student SET bool='false' WHERE id IN(".$students.")";

			if ($con->query($sql) === TRUE) {

			} else {
			    echo "Kulager: " . $conn->error;
			}
		}
		$sql = "INSERT INTO schedule (monday, tuesday, wednesday, thursday, friday, saturday, sunday, mr, tur, wr, thr, fr, sar, sur) VALUES ('$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$mr', '$tur', '$wr', '$thr', '$fr', '$sar', '$sur')";

		if ($con->query($sql) === TRUE) {
			$last_id = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

		$sql = "INSERT INTO class (name_group, subject, teacher_id, schedule) VALUES ('$name', '$subject', '$teacher', '$last_id')";

		if ($con->query($sql) === TRUE) {
			$lastik = $con->insert_id;
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}
		
		$students = $students.",";
		$size = strlen($students);
		$idiwka = "";

		for($i = 0; $i < $size; $i++){
			
			if($students!=",")
			if($students[$i] == ','){
				$sql = "INSERT INTO relation_cs (class_id, student_id) VALUES ('$lastik','$idiwka')";

				if ($con->query($sql) === TRUE) {
					
				} else {
					
			    	echo "EKuma: " . $conn->error;
				}
				$idiwka = "";

			}else{
				
				$idiwka = $idiwka.$students[$i];

			}
		}
		echo "<script>window.location = '../admin_panel.php'</script>";
		function foo($ss){
			if(strlen($ss)==1){
				$ss = "0".$ss;
			}
			return $ss;
		}
?>