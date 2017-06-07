<!DOCTYPE html>
<html>
<head>
	<title>Thousand CRM system</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	Выберите учебное заведение<br>
	<?php 
		include 'php/db/get_all_db.php';
		$i = 0;
		$s = 0;
		$database_names = mysql_query("SELECT * FROM database_list", $list);

		while ($row_names = mysql_fetch_assoc($database_names)) {
		   	echo '<a href="index2.php?id='.$row_names['id'].'">'.$row_names['name'].'</a><br>';
		}
	?>
	<a href="check.php">Check</a>

	<div style="position: fixed; bottom: 0; right: 0">
		<?php 
			include 'php/version.php';
		?>
	</div>
</body>
</html>