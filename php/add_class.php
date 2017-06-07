<?php 
	include 'session.php';
	include 'db/connect_db.php';
	include 'db/insert.php';
?>
<form action="" method="POST">
	<input type="text" maxlength="50" name="name_group" placeholder="name_group">	
	<input type="submit" value="Добавить" name="submit">
</form>
<?php
	if (isset($_POST['submit'])) {
		$name_group = $_POST['name_group'];
		if (empty($name_group) || $name_group == " ") {
			exit("Something gone wrong");
		}
		else{
			$data = array($name_group);
			$fld = array('name_group');
			insert_data($data, $fld, 'teacher', $connection);
		}
	}
?>