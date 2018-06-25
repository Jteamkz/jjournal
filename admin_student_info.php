<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include 'php/connectOS.php';
include 'php/SQLconnect.php';

$id_okushy = $_GET['id'];
$connection->set_charset("utf8");
$just = getAllData('about', $connection);
$about = $just->fetch_assoc();
unset($just);
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
        <?php include "php/headers/admin.php"; ?>
        <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Тесты студента <?php echo $_GET['name']; ?></h2>
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Тест</th>
                                <th data-priority="1">Баллы</th>
                            </tr>
                        </thead>
                        <tbody id="ok">
                            <?php
								$sql = "SELECT * FROM relation_st WHERE id_student = $id_okushy";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									$i = 0;
									while($row = $result->fetch_assoc()) {
										$test_id = $row['id_test'];
										$sql1 = "SELECT * FROM tests WHERE id = $test_id";
										$result1 = $con->query($sql1);
										$row1 = $result1->fetch_assoc();
										$test_name = $row1['name'];
										$test_quests = $row1['numberquests'] + 1;
							?>
								<tr>
                                            <td><?php echo $test_name; ?></td>
                                            <td><?php echo $row['points']." / ".$test_quests; ?></td>
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
                
                <br>
                <br>

			<div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список групп студента <?php echo $_GET['name']; ?></h2>
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Название группы</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql2 = "SELECT * FROM relation_cs WHERE student_id = $id_okushy";
								$result2 = $connection->query($sql2);
								
                                if ($result2->num_rows > 0) {
                                    while ($row2 = $result2->fetch_assoc()) {
										$group_id = $row2['class_id'];
										$sql1 = "SELECT * FROM class WHERE id = $group_id";
										$result1 = $connection->query($sql1);
										
										if ($result1->num_rows > 0) {
											while ($row1 = $result1->fetch_assoc()) {
                            ?>
                                    <tr class="middlel" id="tr<?php echo $shady; ?>">
                                    <th><?php echo "<a href='admin_student_info_days?student_id=".$_GET['id']."&id=".$row1['id']."&name_group=".$row1['name_group']."&name=".$_GET['name']."'>"."<text style='font-weight:normal;'>группа </text> ".$row1['name_group']."</a>"; ?></th>
                                    </tr>
                            <?php             
											}
										}
									}
								}
                            ?>
                            
                            <!-- Repeat -->
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div> <!-- end container -->
    </div>
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