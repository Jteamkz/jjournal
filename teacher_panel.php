<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	if (isset($_SESSION['tele'])) {
    $iin_b = FALSE;
    $tele = $_SESSION['tele'];
	}
	else if(isset($_SESSION['iin'])){
			$iin_b = TRUE;
			$iin = $_SESSION['iin'];
	}
	include 'php/db/connect_db.php';
	include 'php/db/get_all_data.php';
	include 'php/db/get.php';
	include 'php/db/get_query.php';
	include 'php/db/get_personal.php';
	include 'php/SQLconnect.php';

$_SESSION['id'] = $personal['id'];
$id_mugalim = $_SESSION['id'];

//$_SESSION['iin'] = $personal['iin'];
$connection->set_charset("utf8");
$result = getAllData('about', $connection);
$about = $result->fetch_assoc();
	
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jjournal </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">    

    <link href="css/plugins/morris.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/teacher.css">
    <link rel="stylesheet" type="text/css" href="css/custum.css">
    <link rel="stylesheet" type="text/css" href="css/spinner.css">
</head>

<body>

    <div id="wrapper">
      <?php include "php/headers/teacher.php"; ?>

        <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Мои группы</h2>
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Группа</th>
                                <th data-priority="1">Расписание</th>
                            </tr>
                        </thead>
                        <tbody id="ok">
                            <?php
								$sql = "SELECT * FROM class WHERE teacher_id = $id_mugalim";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									$i = 0;
									while($row = $result->fetch_assoc()) {
										$group_id = $row['class_id'];
							?>
								<tr>
                                            <td><?php echo $row['name_group']; ?></td>
                                            <td><a href="schedule_teacher?id=<?php echo $row['schedule']; ?>">Посмотреть</a></td>
								</tr>
							<?php
									}
								}
								//$conn->close(); 
							?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>


            </div> <!-- end container -->
    </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/teacher_save.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>