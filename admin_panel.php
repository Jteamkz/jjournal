<?php 
session_start();
$db_name = $_SESSION['studycenter'];

include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/SQLconnect.php';
include 'php/connectOS.php';
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

    <title>Jjournal - Admin Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">    

    <link href="css/plugins/morris.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/custum.css">
    <style>
            -webkit-scrollbar-track
        {
            border: 1px solid #cccccc;
            background-color: #cccccc;
        }

        ::-webkit-scrollbar
        {
            width: 10px;
            background-color: white;
        }

        ::-webkit-scrollbar-thumb
        {
            background-color: #cccccc;  
        }
        .modal-body input[type=text]{
        margin-bottom:5px;
        }
        .ladygaga hr{
            margin-top : 5px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-jjournal navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_panel.php"><?php echo $about['name'] ?></a>
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
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav side-jjournal">
                    <li class="active">
                        <a class="jjournal-white" href="admin_panel.php"><i class="fa fa-fw fa-dashboard"></i> Панель управления</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="admin_studens.php"><i class="fa fa-fw fa-bar-chart-o"></i> Студенты</a>
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
                        <a  class="jjournal-white" href="admin_tests.php"><i class="fa fa-fw fa-wrench"></i> Тесты</a>
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

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <!--<ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->

                <!--<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->
                <?php 
                        // $fld = array('id');
                        //$result = get_data($fld ,'subjects', $connection);
                        $result = getAllData('subjects', $connection);

                        $num_of_subjects = 0;

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                $num_of_subjects++;
                            }
                        }
                        //unset($result);
                        $result = getAllData('student', $connection);

                        $num_of_students = 0;

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                $num_of_students++;
                            }
                        }

                        $result = getAllData('teacher', $connection);

                        $num_of_teachers = 0;

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                $num_of_teachers++;
                            }
                        }

                        $result = getAllData('class', $connection);

                        $num_of_classes = 0;

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                $num_of_classes++;
                            }
                        }
                    ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Уроки</a></li>
                                        <li><a href="#tab2default" data-toggle="tab">Ученики</a></li>
                                        <li><a href="#tab3default" data-toggle="tab">Учителя</a></li>
                                        <li><a href="#tab4default" data-toggle="tab">Группу</a></li>
                                        <!-- <li class="dropdown">
                                            <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                                <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                            </div>
                            <div class="panel-body" id="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1default">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <i class="fa fa-comments fa-5x"></i>
                                                            </div>
                                                            <div class="col-xs-9 text-right">
                                                                <div class="huge"><?php echo $num_of_subjects; ?></div>
                                                                <div>Предметы</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="admin_subjects.php">
                                                        <div class="panel-footer">
                                                            <span class="pull-left">View Details</span>
                                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <br>
                                                    <button data-toggle="modal" data-target="#myModal" class="btn btn-success btn-lg">Добавить уроки</button>
                                            </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте уроки</h4>
      </div>
      <div class="modal-body">
    <div class="ladygaga">
        <button id="eweSubject" class="btn btn-success">Еще</button>
        <button id="eweSubjectdelete" class="btn btn-danger">Удалить</button>
        <hr>
    </div>
	<form id="subjectForm" method='post'>
		<div style="max-height:250px; height:250px; padding:10px 10px 10px 0px; overflow-y: scroll; overflow-x:hidden;">
		<div class="row">
		<div class="col-lg-6">
		<input type='text' id='namesubject' name='name0' class="form-control" placeholder='Название'>
		</div>
		<div class="col-lg-6">
		<input type='text' class="form-control" placeholder='Описание' name='defenition0' required>
		</div>
		</div>
		<p id="subjectP"></p>
		</div>
    </form>
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
					<button type="button" id="addSubject" class="btn btn-default btn-hover-green" data-action="save" role="button">Add</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2default">
                                        <div class="row">
                                         <div class="col-lg-4 col-md-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-tasks fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-right">
                                                            <div class="huge"><?php echo $num_of_students; ?></div>
                                                            <div>Студенты!</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="admin_studens.php">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">View Details</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        
                                             <div class="col-lg-6">
                                             <br>
                                                    <button data-toggle="modal" data-target="#myModal2" class="btn btn-success btn-lg">Добавить учеников</button>
                                            </div>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте учеников</h4>
      </div>
      <div class="modal-body">
        <div class="ladygaga" style="margin-left:1.2%; margin-right:">
            <button class='btn btn-success' id="eweStudent">Еще</button>
            <button class='btn btn-danger' id="eweStudentdelete">Удалить</button>
            <hr>
        </div>
	<form method='post' id="studentForm">
		<div style="max-height:350px; height:350px; overflow-y: scroll; padding:10px; overflow-x:hidden;">
		<div class="row">
		<div class="col-lg-4">
		<input class="form-control" type='text' name='IIN0' placeholder='ИИН'>
		</div><div class="col-lg-4"><input class="form-control" type='text' name='password0' placeholder='Пароль'>
		</div>
		<div class="col-lg-4">
		<input class="form-control" type='text' name='name0' placeholder='Имя'></div><div class="col-lg-4"><input class="form-control" type='text' name='surname0' placeholder='Фамилия'>
		</div>
		<div class="col-lg-4">
		<input class="form-control" type='text' name='father0' placeholder='Отчество'></div><div class="col-lg-4"><input class="form-control" type='text' name='birthday0' id='dateStudent' placeholder='День рождения'>
		</div>
		<div class="col-lg-4">
		<input class="form-control" type='text' name='phone0' id='telephone' placeholder='Телефон'></div><div class="col-lg-4"><input class="form-control" type='text' name='phoneparent0' placeholder='Телефон Мамки'>
		</div>
		<div class="col-lg-4">
		<input class="form-control" type='text' name='payday0' placeholder='День Оплаты'>
		</div>
		</div>
		<p id="studentP"></p>
		</div></form>
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
					<button type="button" id="addStudent" class="btn btn-default btn-hover-green" data-action="save" role="button">Add</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3default">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $num_of_teachers; ?></div>
                                                        <div>Учители!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="admin_teachers.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                            </div>
                                             <div class="col-lg-6">
                                             <br>
                                                    <button data-toggle="modal" data-target="#myModal3" class="btn btn-success btn-lg">Добавить учителей</button>
                                            </div>

<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте учителей</h4>
      </div>
      <div class="modal-body">
        <div class="ladygaga" style="margin-left:1.2%; margin-right:">
            <button id="eweTeacher" class="btn btn-success">Еще</button>
            <button id="eweTeacherdelete" class="btn btn-danger">Удалить</button>
            <hr>
        </div>
	<form method='post' id="teacherForm">
		<div style="max-height:350px; height:350px; overflow-y: scroll; padding:10px; overflow-x:hidden;">
		<div class="row">
		<div class="col-lg-3">
		<input class="form-control" type='text' name='IIN0' placeholder='ИИН'></div><div class="col-lg-3"><input class="form-control" type='text' name='password0' placeholder='Пароль'></div>
			<div class="col-lg-3"><input class="form-control" type='text' name='name0' placeholder='Имя'></div><div class="col-lg-3"><input class="form-control" type='text' name='surname0' placeholder='Фамилия'></div>
			<div class="col-lg-3"><input class="form-control" type='text' name='father0' placeholder='Отчество'></div>
			<div class="col-lg-3"><input class="form-control" type='text' id='dateTeacher' name='birthday0' placeholder='День рождения'></div>
			<div class="col-lg-3"><input class="form-control" type='text' name='phone0' placeholder='Телефон'>
			</div>
			<div class="col-lg-3">
			<?php 
				echo "<select class='form-control' name='subject0'>";
			$sql = "SELECT * FROM subjects";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."' title='".$row['description']."'>".$row['name']."</option>";
				    }
				} else {
				    echo "0 results";
				}
				echo "</select>";
			?>         
            </div>
        </div>
		<p id="teacherP"></p>
		</div>
	<br></form>
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
					<button type="button" id="addteacher" class="btn btn-default btn-hover-green" data-action="save" role="button">Add</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4default">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                 <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <i class="fa fa-support fa-5x"></i>
                                                            </div>
                                                            <div class="col-xs-9 text-right">
                                                                <div class="huge"><?php echo $num_of_classes; ?></div>
                                                                <div>Группы</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#">
                                                        <div class="panel-footer">
                                                            <span class="pull-left">View Details</span>
                                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                             <div class="col-xs-3">
                                                <!--<form method="POST" action="add/group.php">-->
                                                    <br><a href="groupPage.php" class="btn btn-success btn-lg">Добавить группу</a>
                                                <!--</form>-->

<!-- Modal -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте группу</h4>
      </div>
      <div class="modal-body">
	<div class="formGroupAdding">
	<form method="post" action="add/groupAdd.php">
		<input type="text" placeholder="Название группы" name="name">
		<select name="subject" required>
		<option value="" disabled selected>Выберите предмет</option>
			<?php
				$sql = "SELECT * FROM subjects";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."'' title='".$row['description']."''>".$row['name']."</option>";
				    }
				} else {
				    
				}
			?>
		</select>
		<select name="teacher" required>
		<option value="" disabled selected>Выберите учителя</option>
			<?php
				$sql = "SELECT * FROM teacher";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."'' title='teacher''>".$row['firstname']." ".$row['lastname']." ".$row['fathername']."</option>";
				    }
				} else {
				    
				}
			?>
		</select>
		<br>
		Выберите учеников<br>
		<?php
				$sql = "SELECT * FROM student WHERE bool='true'";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<input name='checkbox[]' type='checkbox'  id='".$row['id']."'  value='".$row['id']."'/>".$row['firstname']." ".$row['lastname']." ".$row['father']."<br>";
				    }
				} else {
				    
				}
				echo "<a id='toggler'>Показать все</a><br>";
				$sql = "SELECT * FROM student WHERE bool='false'";
				$result = $con->query($sql);
					echo "<div id='toggling'>";
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<input name='checkbox[]' type='checkbox'  value='".$row['id']."'/>".$row['firstname']." ".$row['lastname']." ".$row['father']."<br>";
				    }
				} else {
				    
				}
				echo "</div>";
			?>
				<h5 class="togglerH5" id="mondayToggler">Понедельник</h5>
				<div id="mondayDiv">
					<input type="text" placeholder="Кабинет" name="mondayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="monday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="monday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="monday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="monday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="tuesdayToggler">Вторник</h5>
				<div id="tuesdayDiv">
					<input type="text" placeholder="Кабинет" name="tuesdayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="tuesday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="tuesday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="tuesday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="tuesday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="wednesdayToggler">Среда</h5>
				<div id="wednesdayDiv">
					<input type="text" placeholder="Кабинет" name="wednesdayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="wednesday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="wednesday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="wednesday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="wednesday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="thursdayToggler">Четверг</h5>
				<div id="thursdayDiv">
					<input type="text" placeholder="Кабинет" name="thursdayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="thursday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="thursday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="thursday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="thursday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="fridayToggler">Пятница</h5>
				<div id="fridayDiv">
					<input type="text" placeholder="Кабинет" name="fridayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="friday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="friday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="friday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="friday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="saturdayToggler">Суббота</h5>
				<div id="saturdayDiv">
					<input type="text" placeholder="Кабинет" name="saturdayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="saturday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="saturday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="saturday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="saturday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="sundayToggler">Воскресенье</h5>
				<div id="sundayDiv">
					<input type="text" placeholder="Кабинет" name="sundayroom">
					с <input type="text" placeholder="чч" style="width:23px" name="sunday1" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="sunday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:23px" name="sunday3" maxlength="2"><input type="text" placeholder="мм" style="width:23px" name="sunday4" maxlength="2">
				</div>
    	<button>Добавить</button>
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
					<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                   <!--  <div class="tab-pane fade" id="tab4default">Default 4</div>
                                    <div class="tab-pane fade" id="tab5default">Default 5</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <hr>
               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="js/jquery.js"></script>

    <script src="js/actions.js"></script>
	<script src="js/dist/cleave.js"></script>
	<script src="js/dist/addons/cleave-phone.kz.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
		<script>	
			var cleave = new Cleave('#dateStudent', {
				date: true,
				delimiter : ".",
				datePattern: ['d', 'm', 'Y']
			});
			var cleave = new Cleave('#dateTeacher', {
				date: true,
				delimiter : ".",
				datePattern: ['d', 'm', 'Y']
			});
		</script>
    <script>
		var a = "0";
		$("#eweSubject").click(function(){
			 a++;
   			 $("#subjectP").append("<hr id='hrsubject"+a+"'><div class='row' id='subjectrow"+a+"'><div class='col-lg-6'><input type='text' class='form-control' id='subjectName"+a+"' name='name"+a+"' placeholder='Название'></div><div class='col-lg-6'><input class='form-control' type='text' placeholder='Описание' id='subjectDefenition"+a+"' name='defenition"+a+"' required></div></div>");
		});
	
			
	$(document).ready(function(){
	
			
	$("#addSubject").click(function(){
		
			
			var $form = $("#subjectForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/subjectAdd.php?numberSubject='+a,
				type: 'POST',
				data: serializedData,
				success: function(data){
					 location.reload();
				}
			})
		
	});
	$("#eweSubjectdelete").click(function(){
		if(a>0){
			$("#subjectrow"+a).remove();
            $("#hrsubject"+a).remove();
			a = a - 1;
		}
	});
	})
	</script>
		<script>
		var b = "0";
		$("#eweStudent").click(function(){
			 b++;
   			 $("#studentP").append("<hr id='hrstudent"+b+"'><div class='row' id='studentrow"+b+"'><div class='col-lg-4'><input class='form-control' type='text' name='IIN"+b+"' placeholder='ИИН'></div><div class='col-lg-4'><input class='form-control' type='text' name='password"+b+"' placeholder='Пароль'></div><div class='col-lg-4'><input class='form-control' type='text' name='name"+b+"' placeholder='Имя'></div><div class='col-lg-4'><input class='form-control' type='text' name='surname"+b+"' placeholder='Фамилия'></div><div class='col-lg-4'><input class='form-control' type='text' name='father"+b+"'' placeholder='Отчество'></div><div class='col-lg-4'><input class='form-control' type='text' name='birthday"+b+"' placeholder='День рождения'></div><div class='col-lg-4'><input class='form-control' type='text' name='phone"+b+"' placeholder='Телефон'></div><div class='col-lg-4'><input class='form-control' type='text' name='phoneparent"+b+"' placeholder='Телефон Мамки'></div><div class='col-lg-4'><input class='form-control' type='text' name='payday"+b+"' placeholder='День Оплаты'></div></div>");
		});
	
			
	$(document).ready(function(){
	
			
	$("#addStudent").click(function(){
		
			
			var $form = $("#studentForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/studentAdd.php?numberStudent='+b,
				type: 'POST',
				data: serializedData,
				success: function(data){
					 location.reload();
				}
			})
		
	});
	$("#eweStudentdelete").click(function(){
		if(b > 0){
			$("#studentrow"+b).remove();
			$(" #hrstudent"+b ).remove();
			b = b - 1;
		}
	});
	})
	</script>
		<script>
		var c = 0;
		$("#eweTeacher").click(function(){
			 c++;
   			 $.ajax({
		       url: 'add/teacherSelect.php?numberTeacher='+c,
		       success: function(html) {
          	$("#teacherP").append(html);
       }
    });
		});
	
			
	$(document).ready(function(){
	
			
	$("#addteacher").click(function(){
		
			
			var $form = $("#teacherForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/teacherAdd.php?numberTeacher='+c,
				type: 'POST',
				data: serializedData,
				success: function(data){
					 location.reload();
				}
			})
		
	});
	$("#eweTeacherdelete").click(function(){
		if(c>0){
			$("#teacherrow"+c).remove();
			$(" #hrteacher"+c ).remove();
            $("#subjectTeacher"+c).remove();
			c = c - 1;
		}
	});
	})
	</script>
	<script>
			$(document).ready(function(){
				$("#toggling").hide();
			    $("#toggler").click(function(){
			        $("#toggling").toggle(500);
			    });
			    $("#mondayDiv").hide();
			    $("#tuesdayDiv").hide();
			    $("#wednesdayDiv").hide();
			    $("#thursdayDiv").hide();
			    $("#fridayDiv").hide();
			    $("#saturdayDiv").hide();
			    $("#sundayDiv").hide();
			    $("#mondayToggler").click(function(){
			        $("#mondayDiv").toggle(300);
			        $('input[name=mondayroom]').val("");
			        $('input[name=monday1]').val("");
			        $('input[name=monday2]').val("");
			        $('input[name=monday3]').val("");
			        $('input[name=monday4]').val("");
			    });
			    $("#tuesdayToggler").click(function(){
			        $("#tuesdayDiv").toggle(300);
			        $('input[name=tuesdayroom]').val("");
			        $('input[name=tuesday1]').val("");
			        $('input[name=tuesday2]').val("");
			        $('input[name=tuesday3]').val("");
			        $('input[name=tuesday4]').val("");
			    });
			    $("#wednesdayToggler").click(function(){
			        $("#wednesdayDiv").toggle(300);
			        $('input[name=wednesdayroom]').val("");
			        $('input[name=wednesday1]').val("");
			        $('input[name=wednesday2]').val("");
			        $('input[name=wednesday3]').val("");
			        $('input[name=wednesday4]').val("");
			    });
			    $("#thursdayToggler").click(function(){
			        $("#thursdayDiv").toggle(300);
			        $('input[name=thursdayroom]').val("");
			        $('input[name=thursday1]').val("");
			        $('input[name=thursday2]').val("");
			        $('input[name=thursday3]').val("");
			        $('input[name=thursday4]').val("");
			    });
			    $("#fridayToggler").click(function(){
			        $("#fridayDiv").toggle(300);
			        $('input[name=fridayroom]').val("");
			        $('input[name=friday1]').val("");
			        $('input[name=friday2]').val("");
			        $('input[name=friday3]').val("");
			        $('input[name=friday4]').val("");
			    });
			    $("#saturdayToggler").click(function(){
			        $("#saturdayDiv").toggle(300);
			        $('input[name=saturdayroom]').val("");
			        $('input[name=saturday1]').val("");
			        $('input[name=saturday2]').val("");
			        $('input[name=saturday3]').val("");
			        $('input[name=saturday4]').val("");
			    });
			    $("#sundayToggler").click(function(){
			        $("#sundayDiv").toggle(300);
			        $('input[name=sundayroom]').val("");
			        $('input[name=sunday1]').val("");
			        $('input[name=sunday2]').val("");
			        $('input[name=sunday3]').val("");
			        $('input[name=sunday4]').val("");
			    });
			});
</script>
</body>

</html>
