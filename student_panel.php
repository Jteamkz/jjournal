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
                        <a  class="jjournal-white" href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
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

            <div class="container-fluid" id="myAppDobro">

                <div class="row" style="margin-left: 0px; margin-right: 0px">
                    <div>
                        <div class="col-lg-6">

                                
                            <!--<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Поставить посещаемость</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-12">
                                            <h2>Группа: I 1603</h2>
                                        </div>
                                        <div class="col-lg-6 col-lg-12 left-grey">
                                             <h2>Понедельник в 15:00</h2>
                                        </div>
                                    </div>
                                </div>

                            </div>-->
                            <div class="jjournal-panel-top">
                                <p class="jjournal-orange">Предстоящие занятия</p>
                                <p class="jjournal-orange" style="float: right"><a href="schedule.php">Посмотреть расписание</a></p>
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
                                include "php/teacher_panel/birthdays.php";
                            ?>
                        </div>
                        <div class="scroll-j">
                        
                        <ul class="jjournal-orders">
                                <?php 
                                    $order_of_id = 0;
                                    while($order_of_id < sizeof($students_b)){
                                        $query = "id = ".$all_id[$order_of_id];
                                        $tt = get_query($query, 'student', $connection);
                                        if ($tt->num_rows > 0) {
                                            while ($row_ts = $tt->fetch_assoc()) {
                                                ?>
                                                <li><?php echo $row_ts['firstname']." ".$row_ts['lastname']."-".$all[$order_of_id]; ?></li>
                                                <?php
                                            }
                                        }else{
                                            echo "Ошибка";
                                        }
                                        $order_of_id++;
                                    }
                                    
                                
                                ?>
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
                <!-- /.row -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте тест группе</h4>
      </div>
      <div class="modal-body">
	<div class="formGroupAdding">
	<form method="post" action="php/teacher_panel/set_relation_test_class.php" id="testAddToClassForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sel1">Выберите группу:</label>
                        <select name="group" class="form-control" id="sel1">
                            <?php 
                                $get_own_groups = "teacher_id = ".$personal['id'];
                                $tests = get_query($get_own_groups, 'class', $connection);
                                if($tests->num_rows > 0){
                                    while($test_data = $tests->fetch_assoc()){
                                        ?>
                                            <option value="<?php echo $test_data['id']; ?>"><?php echo $test_data['name_group']; ?></option>
                                        <?php
                                    }
                                }else{
                                    echo "error";
                                }
                                
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sel2">Выберите тест:</label>
                        <select name="test" class="form-control" id="sel2">
                            <?php 
                                $tests = getAllData('tests', $connection);
                                if($tests->num_rows > 0){
                                    while($test_data = $tests->fetch_assoc()){
                                        ?>
                                            <option value="<?php echo $test_data['id']; ?>"><?php echo $test_data['name']; ?></option>
                                        <?php
                                    }
                                }else{
                                    echo "error";
                                }
                                
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
    </form>
	</div>
      </div>
      <div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="saveTestToGroup" class="btn btn-default btn-hover-green saveTestToGroup" data-dismiss="modal" role="button">Save</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>
            </div>
            <!-- /.container-fluid -->

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

<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	include "php/SQLconnect.php";
	include "php/connectOS.php";
	
	$sql = "SELECT * FROM tests";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
			echo "<a href='add/testPage.php?id=".$row['id']."'>".$row['name']."</a><br>";   	
	    }
	}else{
		echo "sad";
	}
	?>