﻿﻿<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<script src="/js/jquery.js"></script>
	</head>

	<body>
	<?php
		$n = $_POST['numberStudent'];
		echo "<form method='post' action='studentAdd.php?numberStudent=".$n."'>";
		for($i = 0; $i < $n; $i++){
			echo "<input type='text' name='IIN".$i."' placeholder='ИИН'><input type='text' name='password".$i."' placeholder='Пароль'>
			<input type='text' name='name".$i."' placeholder='Имя'><input type='text' name='surname".$i."' placeholder='Фамилия'>
			<input type='text' name='father".$i."'' placeholder='Отчество'><input type='text' name='birthday".$i."' placeholder='День рождения'>
			<input type='text' name='phone".$i."' placeholder='Телефон'><input type='text' name='phoneparent".$i."' placeholder='Телефон Мамки'>
			<input type='text' name='payday".$i."' placeholder='День Оплаты'><br>";
		}
		echo "<br><button>Add</button></form>";
	?>
	</body>
</html>