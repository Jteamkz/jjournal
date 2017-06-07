<?php 
	$c = $_GET['c'];
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Войти в сеть</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<?php 
		switch ($c) {
		    case 1:
		    	echo "<form action='php/login/login_admin.php?id=".$id."' method='POST'>";
		        echo "<input type='text' name='admin' placeholder='Введите ключь админа'><br>";
		        echo "<input type='password' name='password' placeholder='Введите пароль'>";
		        break;
		    case 2:
		        echo "<input type='text' name='teacher' placeholder='Введите ваш логин учителя'><br>";
		        echo "<input type='password' name='password' placeholder='Введите пароль'>";
		        break;
		    case 3:
		        echo "<input type='text' name='student' placeholder='Введите ваш логин ученика'><br>";
		        echo "<input type='password' name='password' placeholder='Введите пароль'>";
		        break;
		}
		?>
		<button type="submit">Войти</button>
		</form>
	</div>
</body>
</html>