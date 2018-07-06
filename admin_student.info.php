<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include 'php/connectOS.php';

	$connection->set_charset("utf8");
$just = getAllData('about', $connection);
$about = $just->fetch_assoc();
unset($just);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "php/head.php"; ?>
<body>

    <div id="wrapper">
        <?php include "php/headers/admin.php"; ?>
        <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Информация об ученике <?php echo $_GET['name']; ?></h2>
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