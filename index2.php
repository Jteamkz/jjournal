<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}else {
	exit("URL undefined");
}
?>
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
	Выбор<br>
	<a href="verification.php?c=1&id=<?php echo $id; ?>">Админ</a><br>
	<a href="verification.php?c=2&id=<?php echo $id; ?>">Учитель</a><br>
	<a href="verification.php?c=3&id=<?php echo $id; ?>">Студент</a><br>
	
	<div style="position: fixed; bottom: 0; right: 0">
		<?php 
			include 'php/version.php';
		?>
	</div>
</body>
</html>