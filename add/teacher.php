<?php 
	session_start();
	$db_name = $_SESSION['studycenter'];

	include '../php/SQLconnect.php';
	include '../php/connectOS.php'
	?>
<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<script src="/js/jquery.js"></script>
	</head>

	<body>
	<?php
		$n = $_POST['numberTeacher'];
		echo "<form method='post' action='teacherAdd.php?numberTeacher=".$n."'>";
		for($i = 0; $i < $n; $i++){
			echo "<input type='text' name='IIN".$i."' placeholder='ИИН'><input type='text' name='password".$i."' placeholder='Пароль'>
			<input type='text' name='name".$i."' placeholder='Имя'><input type='text' name='surname".$i."' placeholder='Фамилия'>
			<input type='text' name='father".$i."' placeholder='Отчество'><input type='text' name='birthday".$i."' placeholder='День рождения'>
			<input type='text' name='phone".$i."' placeholder='Телефон'>";
			echo "<select name='subject".$i."'>";
			$sql = "SELECT * FROM subjects";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."'' title='".$row['description']."''>".$row['name']."</option>";
				    }
				} else {
				    echo "0 results";
				}
				echo "</select>";
		}
	?>
		<br>
		<button>Add</button>
	</form>
	</body>
</html>