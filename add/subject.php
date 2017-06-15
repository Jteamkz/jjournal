<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<script src="/js/jquery.js"></script>
	</head>

	<body>
	<?php
		$n = $_POST['numberSubject'];
		echo "<form method='post' action='subjectAdd.php?numberSubject=".$n."'>";
		for($i = 0; $i < $n; $i++){
			echo "<input type='text' placeholder='Название' name='name".$i."'><input type='text' placeholder='Описание' name='defenition".$i."'><br>";
		}
		echo "<br><button>Add</button></form>";
	?>
	</body>
</html>