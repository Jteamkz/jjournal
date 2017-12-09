<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "../php/SQLconnect.php";
	include "../php/connectOS.php";
	$idTest = 14;

	class variant {
		public $id;
		public $content;
		public $ids;
		function __construct($id, $content, $ids){
			$this->id = $id;
			$this->content = $content;
			$this->ids = $ids;
		}
	}
	$sql = "SELECT * FROM tests WHERE id='$idTest'";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
	    
	    while($row = $result->fetch_assoc()) {
			$sql1 = "SELECT * FROM questions WHERE ids='$idTest' order by rand()";
			$result1 = $con->query($sql1);

			if ($result1->num_rows > 0) {
			    
			    while($row1 = $result1->fetch_assoc()) {
			    	$idQues = $row1['id'];
			        echo $row1['question']."<br>";
			        $variants = array();
			        $sql2 = "SELECT * FROM rights WHERE ids='$idQues'";
					$result2 = $con->query($sql2);

					if ($result2->num_rows > 0) {
					    // output data of each row
					    while($row2 = $result2->fetch_assoc()) {
					    	$variant = new variant($row2['id'], $row2['rightanswer'], $row2['ids']);
					        array_push($variants, $variant);
					    }
					}
					$sql3 = "SELECT * FROM wrongs WHERE ids='$idQues'";
					$result3 = $con->query($sql3);

					if ($result3->num_rows > 0) {
					    // output data of each row
					    while($row3 = $result3->fetch_assoc()) {
					    	$variant = new variant($row3['id'], $row3['wrong'], $row3['ids']);
					        array_push($variants, $variant);
					    }
					}
					shuffle($variants);
					foreach ($variants as $variantko) {
					    echo "<input type='checkbox'>".$variantko->content;
					    echo "<br>";
					}
			    }
			} else {
			    echo "";
			}
	    }
	} else {
	    echo "";
	}
	
	?>