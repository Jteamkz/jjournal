<?php 
include 'session.php';
include 'db/connect_db.php';

$class = "SELECT name_group, id, teacher_id FROM class";
$class = $connection->query($class);
if ($class->num_rows > 0) {
	while ($row = $class->fetch_assoc()) {
		echo "Название группы: ";
		echo $row['name_group']."|";
		$teacher = "SELECT * FROM teacher WHERE id = '".$row['id']."'";
		$teacher = $connection->query($teacher);
		if ($teacher->num_rows > 0) {
			while ($row2 = $teacher->fetch_assoc()) {
				echo "Данные уичтеля. Имя:". $row2['firstname']." Фамилия:". $row2['lastname'];
			}
		} else {
		    echo "no teacher connected to the class";
		}
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
	}
}

?>