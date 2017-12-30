<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	$idTest = $_GET['id'];
	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
	echo "<style>body{overflow-x:hidden; padding-left:30px; padding-top:20px;}</style>";
	echo "<link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>";
	echo "<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>";
	echo "<link rel='stylesheet' type='text/css' href='../css/testPage.css'>";
	class variant {
		public $id;
		public $content;
		public $ids;
		function __construct($id, $content, $ids, $bool){
			$this->id = $id;
			$this->content = $content;
			$this->ids = $ids;
			$this->bool = $bool;
		}
	}
	
	$sql = "SELECT * FROM tests WHERE id='$idTest'";
	$result = $con->query($sql);
	$questNum = 0;
	if ($result->num_rows > 0) {
	    
	    while($row = $result->fetch_assoc()) {
			echo "<form method='post' action='testCheck.php?array=".$row['array']."&numberquests=".$row['numberquests']."'>";
			echo "<input type='hidden' name='testId' value='".$idTest."'>";
			$sql1 = "SELECT * FROM questions WHERE ids='$idTest'";
			$result1 = $con->query($sql1);
			
			if ($result1->num_rows > 0) {
			    
			    while($row1 = $result1->fetch_assoc()) {
			    	$idQues = $row1['id'];
					echo "<input type='hidden' name='vopros".$questNum."' value='".$row1['id']."'>";
			        echo $row1['question']."<br>";
			        $variants = array();
			        $sql2 = "SELECT * FROM variant WHERE ids='$idQues'";
					$result2 = $con->query($sql2);

					if ($result2->num_rows > 0) {
					    // output data of each row
					    while($row2 = $result2->fetch_assoc()) {
					    	$variant = new variant($row2['id'], $row2['content'], $row2['ids'], $row2['bool']);
					        array_push($variants, $variant);
					    }
					}
					shuffle($variants);
					$answerNum = 0;
					foreach ($variants as $variantko) {
						echo "<div class='checkbox checkbox-success'><input type='checkbox' id='".$variantko->id."' name='"."answer".$questNum.$answerNum."' value='".$variantko->id."'><label for='".$variantko->id."'>".$variantko->content."</label></div>";
						$answerNum++;
					}
					
					$questNum++;
			    }
			} else {
			    echo "";
			}
	    }
	} else {
	    echo "";
	}
	echo "<button class='btn btn-success'>Закончить тест</button>";
	echo "</form>";
?>