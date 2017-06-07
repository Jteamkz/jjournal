<?php 
	include 'session.php';
	include 'db/connect_db.php';
	include 'db/insert.php';
?>
<form action="" method="POST">
	<input type="text" maxlength="50" name="name" placeholder="name" >
	<input type="text" maxlength="50" name="lastname" placeholder="lastname" >
	<input type="submit" value="Добавить" name="submit">
</form>
<?php 
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$surname = $_POST['lastname'];
		if (empty($name) || empty($surname) || $surname == " " || $name == " ") {
			exit("Something gone wrong");
		}
		else{
			$data = array($name, $surname);
			$fld = array('firstname', 'lastname');
			insert_data($data, $fld, 'teacher', $connection);
		}
	}
?>