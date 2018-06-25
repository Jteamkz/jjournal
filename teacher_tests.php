<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include "php/SQLconnect.php";
include "php/connectOS.php";
    $connection->set_charset("utf8");
$just = getAllData('about', $connection);
$about = $just->fetch_assoc();
unset($just);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Учители</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jjournal - Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!-- <link href="css/plugins/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/rwd-table.css">

    <link rel="stylesheet" type="text/css" href="css/finder.css">

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
                        <h2>Список тестов <a href="add/test" class="btn btn-success">Добавить тест</a></h2>
                    </div>
                    <div>
                        <p>Искать</p>
                        <input type="text" class="search form-control" placeholder="Введите что вы ищете" 
                        <?php 
                            if (isset($_GET['name'])) {
                                echo "value='".$_GET['name']."'";
                            }
                        ?>>
                        <span class="counter pull-right"></span>

                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th data-priority="1">Описание</th>
                                <th data-priority="1">Количество вопросов</th>
                                <th data-priority="1">Группы</th>
                                <th></th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody id="ok">
                            <?php 
                                $result = get_query(' teacher_id = '.$_SESSION['id'], 'class', $connection);

                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) {
										$idTest = $row['id'];
                                        $shady++;
										$sql45 = "SELECT * FROM relation_gt WHERE group_id = $idTest";
										$result45 = $con->query($sql45);

										if ($result45->num_rows > 0) {
											// output data of each row
											while($row45 = $result45->fetch_assoc()) {
													$idtestik = $row45['test_id'];
													$sql55 = "SELECT * FROM tests WHERE id = $idtestik";
													$result55 = $con->query($sql55);

													if ($result55->num_rows > 0) {
														// output data of each row
														while($row55 = $result55->fetch_assoc()) {
                                    ?>                                    
                                        <tr class="middlel" id="tr<?php echo $shady; ?>">
                                            <th><?php echo $row55['name']; ?></th>
                                            <td><?php echo $row55['description']; ?></td>
                                            <td><?php echo $row55['numberquests'] + 1; $numberquests = $row55['numberquests'] + 1; ?></td>
                                            <td><?php 
                                                $data_groups = array();
                                                $query = "test_id = ".$row55['id'];
                                                $result_gt = get_query($query, 'relation_gt', $connection);
                                                if ($result_gt->num_rows > 0) {
                                                    $temp = 0;
                                                    while ($row_gt = $result_gt->fetch_assoc()) {
                                                        $temp++;
                                                        $query_s = "id = ".$row_gt['group_id'];
														$idGroup = $row_gt['group_id'];
                                                        $result_sb = get_query($query_s, 'class', $connection);
                                                        while ($row_sb = $result_sb->fetch_assoc()) {
                                                            if ($temp < $result_ts->num_rows) {
                                                                echo "<a href='result_test?numberquests=$numberquests&id_group=".$idGroup."&id_test=".$idtestik."'>".$row_sb['name_group']."</a><br>";
                                                            }else{
                                                                echo "<a href='result_test?numberquests=$numberquests&id_group=".$idGroup."&id_test=".$idtestik."'>".$row_sb['name_group']."</a><br>";
                                                            }
                                                            $data_subjects[$temp - 1] = $row_sb['name'];
                                                        }
                                                    }
                                                }else{
                                                    echo "Тест не привязан";
                                                }
                                                // print_r($data_subjects);
                                            ?>
                                            </td>
                                            
                                            <td>
                                                <button style="width: 25px; height: 25px" data-toggle="modal" data-target="#squarespaceModal<?php echo $shady; ?>" type="button" class="btn btn-success btn-xs btn-update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                                <button shady="<?php echo $shady; ?>" test = "<?php echo $row['id']; ?>" style="width: 25px; height: 25px" type="button" class="btn btn-danger btn-xs delete_test"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                            </td>
                                        </tr>

                            <?php
								}}
							}
                                }
									}
								}
                            ?>
                            
                            <!-- Repeat -->
                            
                        </tbody>
                    </table>
                            <?php 
                                $result = getAllData('tests', $connection);

                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) {
										$idTest = $row['id'];
                                        $shady++;
                                    ?>
                                            <?php 
                                                $data_groups = array();
                                                $query = "test_id = ".$row['id'];
                                                $result_gt = get_query($query, 'relation_gt', $connection);
                                                if ($result_gt->num_rows > 0) {
                                                    $temp = 0;
                                                    while ($row_gt = $result_gt->fetch_assoc()) {
                                                        $temp++;
                                                        $query_s = "id = ".$row_gt['group_id'];
														$idGroup = $row_gt['group_id'];
                                                        $result_sb = get_query($query_s, 'class', $connection);
                                                        while ($row_sb = $result_sb->fetch_assoc()) {
                                                            if ($temp < $result_ts->num_rows) {
                                                                //echo "<a href='result_test.php?id_group=".$idGroup."&id_test=".$idTest."'>".$row_sb['name_group']."</a><br>";
                                                            }else{
                                                                //echo "<a href='result_test.php?id_group=".$idGroup."&id_test=".$idTest."'>".$row_sb['name_group']."</a><br>";
                                                            }
                                                            $data_subjects[$temp - 1] = $row_sb['name'];
                                                        }
                                                    }
                                                }else{
                                                    //echo "Тест не привязан";
                                                }
                                                // print_r($data_subjects);
                                            ?>
                                            <div class="modal fade" id="squarespaceModal<?php echo $shady; ?>" shady="<?php echo $shady; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                            <h3 class="modal-title" id="lineModalLabel">Привяжите тест к группе</h3>
                                                        </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Группы</label>
                                                                            <div style="max-height: 155px; overflow-y:scroll">
																			<form id="changeForm<?php echo $idTest; ?>" method="post">
                                <?php
                                    $sql = "SELECT * FROM relation_gt WHERE test_id = $idTest";
									$result2 = $con->query($sql);
									if ($result2->num_rows > 0) {
										$groups = array();
										// output data of each row
										while($row = $result2->fetch_assoc()) {
											array_push($groups, $row['group_id']);
										}
										$sql1 = "SELECT * FROM class";
										$result1 = $con->query($sql1);

										if ($result1->num_rows > 0) {
											// output data of each row
											while($row1 = $result1->fetch_assoc()) {
												if(!in_array($row1['id'], $groups)){
													//echo "<label>\n";
													echo "<input type='checkbox' atta='".$row1['id']."' value='".$row1['id']."' name='checkboxname[]'> ".$row1['name_group']."\n";
													//echo "</label><br>";
													echo "<br>";
												}
											}
										}
										unset($groups);
									}else{
										$sql1 = "SELECT * FROM class";
										$result1 = $con->query($sql1);

										if ($result1->num_rows > 0) {
											// output data of each row
											while($row1 = $result1->fetch_assoc()) {
												//echo "<label>\n";
												echo "<input type='checkbox' atta='".$row1['id']."' value='".$row1['id']."' name='checkboxname[]'> ".$row1['name_group']."\n";
												//echo "</label><br>";
												echo "<br>";
											}
										}
									}
                                ?>
								</form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                                    <div class="btn-group" role="group">
                                                                        <button type="button" id="closeNew" class="btn btn-default closer" data-dismiss="modal"  role="button">Close</button>
                                                                    </div>
                                                                    <div class="btn-group" role="group">
                                                                        <button type="button" id="saveNew<?php echo $shady; ?>" idTest="<?php echo $idTest; ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver_test" data-action="save" role="button">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
													</form>
                                                  </div>
                                            </div>
                                        </tr>

                            <?php   }
                                }else{
                                    exit('');
                                }
                            ?>
                </div>
                </div>
            </div>
                
                <br>
                <br>


            </div> <!-- end container -->
    </div>
</div>
    

   <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/spinn.js"></script>
    <script type="text/javascript" src="js/finder.js"></script>
    <script type="text/javascript" src="js/rwd-table.js"></script>
    <script type="text/javascript" src="js/update.js"></script>
    <script type="text/javascript" src="js/delete.js"></script>
</body>
</html>