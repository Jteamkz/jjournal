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
			echo "<input type='text' name='IIN".$i."'><input type='text' name='password".$i."'>
			<input type='text' name='name".$i."'><input type='text' name='surname".$i."'>
			<input type='text' name='father".$i."''><input type='text' name='birthday".$i."'>
			<input type='text' name='phone".$i."'>";
		}
		echo "<br><button>Add</button></form>";
	?>
	</body>
</html>