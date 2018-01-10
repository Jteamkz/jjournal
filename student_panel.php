<<<<<<< HEAD
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

$_SESSION['id'] = $personal['id'];
$_SESSION['iin'] = $personal['iin'];
$connection->set_charset("utf8");
$result = getAllData('about', $connection);
$about = $result->fetch_assoc();
	
	
	?>
	<!DOCTYPE html>
=======
<?php 
session_start();

$db_name = $_SESSION['studycenter'];
/*if (isset($_SESSION['tele'])) {
    $iin_b = FALSE;
    $tele = $_SESSION['tele'];
}
else if(isset($_SESSION['iin'])){
    $iin_b = TRUE;
    $iin = $_SESSION['iin'];
}*/
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include 'php/db/get_personal.php';

/*$_SESSION['id'] = $personal['id'];
$_SESSION['iin'] = $personal['iin'];*/
$connection->set_charset("utf8");

$result = getAllData('about', $connection);
$about = $result->fetch_assoc();

?>
<!DOCTYPE html>
>>>>>>> origin/master
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jjournal <?php echo $personal['id']; ?></title>

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
<<<<<<< HEAD

=======
>>>>>>> origin/master
        <nav class="navbar navbar-default navbar-jjournal navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="te.php"><?php echo $about['name']; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $db_name; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav side-jjournal">
                    <li class="active">
                        <a class="jjournal-white" href=""><i class="fa fa-fw fa-dashboard"></i> Панель управления</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="teacher_students.php"><i class="fa fa-fw fa-bar-chart-o"></i> Студенты</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="admin_teachers.php"><i class="fa fa-fw fa-table"></i> Учители</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="admin_subjects.php"><i class="fa fa-fw fa-edit"></i> Предметы</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="admin_groups.php"><i class="fa fa-fw fa-desktop"></i> Группы</a>
                    </li>
                    <li>
<<<<<<< HEAD
                        <a  class="jjournal-white" href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
=======
                        <a  class="jjournal-white" href="#"><i class="fa fa-fw fa-wrench"></i> Тесты</a>
>>>>>>> origin/master
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
<<<<<<< HEAD

            <div class="container-fluid" id="myAppDobro">

                <div class="row" style="margin-left: 0px; margin-right: 0px">
                    <div>
                        <div class="col-lg-6">
                            <div class="jjournal-panel-top">
                                <p class="jjournal-orange">Предстоящие занятия</p>
                                <p class="jjournal-orange" style="float: right"><a href="schedule_student.php">Посмотреть расписание</a></p>
                            </div>
                            <div class="scroll-j">
                                <ul class="jjournal-orders">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                Группа: I 1603                                         
                                            </div>
                                            <div class="col-lg-6">
                                                в Понедельник 16:30
                                            </div>
                                        </div>  
                                    </li>
                                    <li>
                                    rewq  
                                    </li>
                                    <li>
                                    asdf 
                                    </li>
                                    <li>
                                        fdsa
                                    </li>
                                </ul>
                            </div>
                            
                    </div>
                    <div class="col-lg-6">
                        <div class="jjournal-panel-top">
                            <p class="jjournal-green">Предстоящие дни рождения</p>
                            <?php
                                //include "php/teacher_panel/birthdays.php";
                            ?>
                        </div>
                        <div class="scroll-j">
                        
                        <ul class="jjournal-orders">
                                
                        </ul>
                        </div>
                        
                    </div>
                     <div class="col-lg-6">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div> 

                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                    
                        <a data-toggle="modal" data-target="#myModal" class="btn btn-success">Test database</a>
                        <a class="btn btn-success">Test a group</a>
                        <a class="btn btn-success">Create test</a>
                    </div>
                    
                </div>
                
                <div>
                    
                </div>

            </div>
        </div>
    </div>
		
=======
			<div style="padding-left:10px;" class="jjournal-panel-top">
				<?php
					include 'php/SQLconnect.php';
					include 'php/connectOS.php';
					$iin = $_SESSION['iin'];
					$tele = $_SESSION['tele'];
					$sql = "SELECT * FROM student WHERE iin = '$iin' OR phone = '$tele'";
					$result = $con->query($sql);
					$tests = array();
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
												echo "<a style='margin-top:5px; width:100px;' class='btn btn-success' href='add/testPage.php?id=".$row5['id']."'>".$row5['name']."</a><br>";
											}
										}
									}
								}
							}
				?>
			</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
>>>>>>> origin/master
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