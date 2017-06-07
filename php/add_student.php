<?php 
	include 'session.php';
	include 'db/connect_db.php';
	include 'db/insert.php';
?>
<form action="" method="POST">
	<input type="text" maxlength="50" name="firstname" placeholder="firstname">
	<input type="text" maxlength="50" name="lastname" placeholder="lastname"><br>
	<?php 
		$sql = "SELECT id FROM class";
		$result = $connection->query($sql);

		if ($result->num_rows > 0) {
			$order = 0;
		    while($row = $result->fetch_assoc()) {
		    	$order++;
		        echo "<input type='checkbox' name='class".$order."' value='".$row["id"]."'>".$row["id"]."<br>";
		    }
		} else {
		    echo "0 results";
		}
	?>
	<input type="submit" value="Добавить" name="submit">
</form><br>
<a href="../admin_panel.php">Назад</a>
<?php 
	if (isset($_POST['submit'])) {
		$name = $_POST['firstname'];
		$surname = $_POST['lastname'];
		$classes = array();
		$counter = 0;
		for ($i=0; $i < $order; $i++) { 
		$t = $i +1;
		$class = "class".$t;
			if (isset($_POST[$class])) {
				$classes[$counter] = $_POST[$class];
				$counter++;
			}
		}

		if (empty($name) || empty($surname) || $surname == " " || $name == " ") {
			exit("Something gone wrong");
		}
		else{
			$data = array($name, $surname);
			$fld = array('firstname', 'lastname');
			insert_data($data, $fld, 'student', $connection);
		}

		$sql = "SELECT id FROM student WHERE firstname = '$name' and lastname = '$surname'";
		$result = $connection->query($sql);
		$student_id = $result->fetch_assoc();
		$student_id = $student_id['id'];



		for ($i=0; $i < $counter; $i++) { 
			$problema = $classes[$i];
			$relation_cs = "INSERT INTO relation_cs (class_id, student_id) VALUES ('$problema', '$student_id')";

			if ($connection->query($relation_cs) == TRUE) {
				echo "done";
			}else{	
				echo "Error <a href='../admin_panel.php'>Назад</a>".$connection->error;
			}
		}
	}
?>