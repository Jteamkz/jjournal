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
$id_okushy = $_SESSION['id'];
//$_SESSION['iin'] = $personal['iin'];
$connection->set_charset("utf8");
$result = getAllData('about', $connection);
$about = $result->fetch_assoc();
	
	?>
<!DOCTYPE html>
<html lang="en">
<?php include "php/head.php"; ?>
<body>
<?php include "php/headers/student.php"; ?>
    <div id="wrapper">
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
								$sql = "SELECT * FROM relation_cs WHERE student_id = $id_okushy";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									$i = 0;
									while($row = $result->fetch_assoc()) {
										$group_id = $row['class_id'];
										$sql1 = "SELECT * FROM class WHERE id = $group_id";
										$result1 = $con->query($sql1);
										$row1 = $result1->fetch_assoc();
							?>
								<tr>
                                            <td><?php echo $row1['name_group']; ?></td>
                                            <td><a href="schedule_student?id=<?php echo $row1['schedule']; ?>">Посмотреть</a></td>
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
					<div class="page-header">
                        <h2>Не сданные тесты</h2>
                    </div>
                <div style="padding-left:10px; padding-top:10px; padding-bottom:15px;" class="jjournal-panel-top">
				<?php
					include 'php/SQLconnect.php';
					include 'php/connectOS.php';
					$iin = $_SESSION['iin'];
					$tele = $_SESSION['tele'];
					$sql = "SELECT * FROM student WHERE iin = '$iin' OR phone = '$tele'";
					$result = $con->query($sql);
					$tests = array();
					$testter = array();
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$student_id_list = $row['id'];
							$sql1 = "SELECT * FROM relation_cs WHERE student_id = $student_id_list";
							$result1 = $con->query($sql1);
							
							if ($result1->num_rows > 0) {
								// output data of each row
								while($row1 = $result1->fetch_assoc()) {
									$group_id_list = $row1['class_id'];
									$sql2 = "SELECT * FROM relation_gt WHERE group_id = $group_id_list";
									$result2 = $con->query($sql2);

									if ($result2->num_rows > 0) {
										// output data of each row
										while($row2 = $result2->fetch_assoc()) {
											$test_id_list = $row2['test_id'];
											$sql3 = "SELECT * FROM relation_st WHERE id_student = $student_id_list AND id_test = $test_id_list";
											$result3 = $con->query($sql3);

											if ($result3->num_rows > 0) {
												// output data of each row
												while($row3 = $result3->fetch_assoc()) {
													array_push($tests, $row3['id_test']);
												}
											}
										}
									}
									$sql4 = "SELECT * FROM relation_gt WHERE group_id = $group_id_list";
									$result4 = $con->query($sql4);
									if ($result4->num_rows > 0) {
										// output data of each row
										while($row4 = $result4->fetch_assoc()) {
											if(!in_array($row4['test_id'], $tests)){
												$idId = $row4['test_id'];
												$sql5 = "SELECT * FROM tests WHERE id=$idId";
												$result5 = $con->query($sql5);

												if ($result5->num_rows > 0) {
													// output data of each row
													while($row5 = $result5->fetch_assoc()) {
														if(!in_array($row5['id'], $testter))
															echo "<a style='margin-top:5px; width:100px;' class='btn btn-success' href='add/testPage?id=".$row5['id']."'>".$row5['name']."</a><br>";
														array_push($testter, $row5['id']);
													}
												}
											}
										}
									}
								}
							}
						}
					}
				?>
			</div>
                <br>
                <br>


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