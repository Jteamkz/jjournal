<?php
	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
	echo "<style>body{overflow-x:hidden; padding-left:30px; padding-top:20px;}</style>";
	echo "<link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>";
	echo "<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>";
	echo "<link rel='stylesheet' type='text/css' href='../css/testPage.css'>";
	$array = $_GET['array'].",";
	$numberquests = $_GET['numberquests'];
	$numberAns = "";
	$i = 0;
	echo "Название теста: ".$_POST['name']."<br>";
	echo "Описание: ".$_POST['description']."<br>";
	echo "<form method='post' action='submitTest.php?array=".$_GET['array']."&numberquests=".$numberquests."'>";
	echo "<input type='hidden' name='name' value='".$_POST['name']."'>";
	echo "<input type='hidden' name='description' value='".$_POST['description']."'>";
		for($j = 0; $j < strlen($array); $j++){
			if($array[$j] == ','){
				echo ($i+1).") ".$_POST['vopros'.$i]."<br>";
				echo "<input type='hidden' name='vopros".$i."' value='".$_POST['vopros'.$i]."'>";
				for($k = 0; $k < $numberAns; $k++){
					$variant = $_POST['answer'.$i.$k];
					echo "<div class='checkbox checkbox-success'><input type='checkbox' id='".$i.$k."' name='"."answer".$i.$k."' value='".$variant."'><label for='".$i.$k."'>".$variant."</label></div>";
					echo "<input type='hidden' name='"."answerZamena".$i.$k."' value='".$variant."'>";
				}
				$numberAns = "";
				$i++;
			}else{
				$numberAns = $numberAns + $array[$j];
			}
		}
		echo "<button class='btn btn-success'>Сохранить</button>";
	echo "</form>";
?>