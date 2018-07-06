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
<?php include "php/head.php"; ?>
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
<body id="bodyman">

    <div id="wrapper">
	<?php include "php/headers/admin.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Админ-панель <small>Просмотр таблиц</small>
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
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Предметы</a></li>
                                        <li><a href="#tab2default" data-toggle="tab">Студенты</a></li>
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
                                                                <div class="huge" id="subjectHuge"><?php echo $num_of_subjects; ?></div>
                                                                <div>Предметы</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="admin_subjects">
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
                                                    <button data-toggle="modal" data-target="#myModal" class="btn btn-success btn-lg">Добавить предметы</button>
                                            </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте предметы</h4>
      </div>
      <div class="modal-body" id="subjectBody">
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
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Закрыть</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Удалить</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="addSubject" class="btn btn-default btn-hover-green" data-action="save" role="button">Добавить</button>
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
                                                            <div class="huge" id="studentHuge"><?php echo $num_of_students; ?></div>
                                                            <div>Студенты</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="admin_studens">
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
                                                    <button data-toggle="modal" data-target="#myModal2" class="btn btn-success btn-lg">Добавить студентов</button>
                                            </div>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте студентов</h4>
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
		<input class="form-control" type='text' name='father0' placeholder='Отчество'></div><div class="col-lg-4"><input class="form-control dateStudent" type='text' name='birthday0' placeholder='День рождения'>
		</div>
		<div class="col-lg-4">
		<input class="form-control" type='text' name='phone0' id='telephone' placeholder='Телефон'></div><div class="col-lg-4"><input class="form-control" type='text' name='phoneparent0' placeholder='Номер родителей'>
		</div>
		</div>
		<p id="studentP"></p>
		</div></form>
      </div>
      <div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Закрыть</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Удалить</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="addStudent" class="btn btn-default btn-hover-green" data-action="save" role="button">Добавить</button>
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
                                                        <div class="huge" id="teacherHuge"><?php echo $num_of_teachers; ?></div>
                                                        <div>Учителя</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="admin_teachers">
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
			<div class="col-lg-3"><input class="form-control dateTeacher" type='text' name='birthday0' placeholder='День рождения'></div>
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
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Закрыть</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Удалить</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="addteacher" class="btn btn-default btn-hover-green" data-action="save" role="button">Добавить</button>
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
                                                    <br><a href="groupPage" class="btn btn-success btn-lg">Добавить группу</a>
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
		Выберите студентов<br>
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
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Закрыть</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Удалить</button>
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
    <!--<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>-->
	<script src="js/admin-panel.js"></script>
</body>

</html>
