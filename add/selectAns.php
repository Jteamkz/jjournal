<?php
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
					echo "<input type='checkbox' name='"."answer".$i.$k."' value='".$variant."'>".$variant."<br>";
					echo "<input type='hidden' name='"."answerZamena".$i.$k."' value='".$variant."'>";
				}
				$numberAns = "";
				$i++;
			}else{
				$numberAns = $numberAns + $array[$j];
			}
		}
		echo "<button>Сохранить</button>";
	echo "</form>";
?>