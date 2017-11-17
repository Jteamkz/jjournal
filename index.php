<!DOCTYPE html>
<html>
<head>
	<title>Thousand CRM system</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<form action="php/login/login.php" method="POST">
		<input type='text' name='user_name' placeholder='Введите свой телефон или ИИН'><br>
		<input type='password' name='password' placeholder='Введите пароль'>
		<button type="submit">Войти</button>
	</form>

	<div style="position: fixed; bottom: 0; right: 0">
		<?php 
			include 'php/version.php';
			echo " ".phpversion();
		?>
	</div>
</body>
</html>