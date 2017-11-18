<?php 
	session_start();
	$db_name = $_SESSION['studycenter'];

	include '../php/SQLconnect.php';
	include '../php/connectOS.php'
	?>
	<?php
		$n = $_GET['numberTeacher'];
			echo "<div class='row' id='teacherrow".$n."'><div class='col-lg-3'><input class='form-control' type='text' name='IIN".$n."' placeholder='ИИН'></div><div class='col-lg-3'><input class='form-control' type='text' name='password".$n."' placeholder='Пароль'></div><div class='col-lg-3'><input class='form-control' type='text' name='name".$n."' placeholder='Имя'></div><div class='col-lg-3'><input class='form-control' type='text' name='surname".$n."' placeholder='Фамилия'></div><div class='col-lg-3'><input class='form-control' type='text' name='father".$n."'' placeholder='Отчество'></div><div class='col-lg-3'><input class='form-control' type='text' name='birthday".$n."' placeholder='День рождения'></div><div class='col-lg-3'><input class='form-control' type='text' name='phone".$n."' placeholder='Телефон'></div><div class='col-lg-3'>";
			echo "<select class='form-control' id='subjectTeacher".$n."' name='subject".$n."'>";
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
				echo "</select><br id='brteacher".$n."'></div></div>";
		
	?>