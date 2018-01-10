<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';

    $connection->set_charset("utf8");
$just = getAllData('about', $connection);
$about = $just->fetch_assoc();
unset($just);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Группы</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thousand - Admin Page</title>

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
    <nav class="navbar navbar-default navbar-jjournal navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_panel.php"><?php echo $about['name']; ?></a>
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
                    <li class="">
                        <a class="jjournal-white" href="admin_panel.php"><i class="fa fa-fw fa-dashboard"></i> Панель управления</a>
                    </li>
                    <li >
                        <a  class="jjournal-white" href="admin_studens.php"><i class="fa fa-fw fa-bar-chart-o"></i> Студенты</a>
                    </li>
                    <li >
                        <a  class="jjournal-white" href="admin_teachers.php"><i class="fa fa-fw fa-table"></i> Учители</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="admin_subjects.php"><i class="fa fa-fw fa-edit"></i> Предметы</a>
                    </li>
                    <li class="active">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список групп</h2>
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
                                <th>Название группы</th>
                                <th data-priority="1">Учитель</th>
                                <th data-priority="1">Предмет</th>
                                <th data-priority="1">Расписние</th>
                                <th data-priority="1">Студенты</th>
                                <th></th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getAllData('class', $connection);
                                if ($result->num_rows > 1) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) { 
                                        $shady++;
                                    ?>
                                    <tr class="middlel" id="tr<?php echo $shady; ?>">
                                    <th><?php echo $row['name_group']; ?></th>
                                    <td><?php 
                                        $teacher_id = -1;
                                        if ($row['teacher_id']!=null) {
                                            $query = "id = ".$row['teacher_id'];
                                            $teacher = get_query($query, 'teacher', $connection);
                                            $row_teacher = $teacher->fetch_assoc();
                                            echo $row_teacher['firstname']." ".$row_teacher['lastname']." ".$row_teacher['fathername'];
                                            $teacher_id = $row['teacher_id'];
                                            unset($query);
                                        }else{
                                            echo "Учитель не привязан";
                                        }
                                    ?></td>
                                    <td>
                                        <?php 
                                            if (is_null($row['subject'])) {
                                                $subject = -1;
                                                echo "Предмет не привязан";
                                                $group_subject = "hitler";
                                            }else{
                                                $query = "id = ".$row['subject'];
                                                $subject = get_query($query, 'subjects', $connection);
                                                $row_subject = $subject->fetch_assoc();
                                                echo $row_subject['name'];
                                                $group_subject = $row_subject['name'];
                                                unset($query);
                                                $subect = $row_subject['id'];
                                                $subject = -9;
                                            }
                                            
                                        ?>
                                    </td>
                                    <td>Insert to Database</td>
                                    <td>
                                        <ul style="list-style: none; padding-left: 10px">
                                        <?php 
                                            $query = "class_id = ".$row['id'];
                                            $students = get_query($query, 'relation_cs', $connection);
                                            if ($students->num_rows >= 1) {
                                                while ($row_students = $students->fetch_assoc()) {
                                                    $query_ins = "id = ".$row_students['student_id'];
                                                    $single = get_query($query_ins, 'student', $connection);
                                                    $row_student = $single->fetch_assoc();
                                                    echo "<li><a href='admin_studens.php?name=".$row_student['firstname']." ".$row_student['lastname']."'>".$row_student['firstname']." ".$row_student['lastname']."</a></li>";
                                                }
                                            }else{
                                                echo "Ученики не привязаны";
                                            }                                            
                                        ?>
                                        </ul>
                                    </td>
                                            <td>
                                                <button style="width: 25px; height: 25px" data-toggle="modal" data-target="#squarespaceModal<?php echo $shady; ?>" type="button" class="btn btn-success btn-xs btn-update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                                <button style="width: 25px; height: 25px" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                            </td>

                                            <div class="modal fade" id="squarespaceModal<?php echo $shady; ?>" shady="<?php echo $shady; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                            <h3 class="modal-title" id="lineModalLabel">Введите новые значения</h3>
                                                        </div>
                                                        <form id="changeForm<?php echo $shady; ?>" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                        <label for="InputFirstname">Название</label>
                                                                        <input type="text" name="name" class="form-control" id="InputFirstname" placeholder="Введите название" value="<?php echo $row['name_group']; ?>">
                                                                        <input type="text" id="IID" name="IID" style="display: none;" value="<?php echo $row['id']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6"> 
                                                                        <div class="form-group">
                                                                            <label for="InputName">Расписние</label>
                                                                            <input type="text" class="form-control" id="InputName" placeholder="Введите Имя" value="Insert to Database">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Преподаватель</label>
                                                                            <div style="max-height: 105px; overflow-y:scroll">
                                <?php 
                                    if ($teacher_id == -1) {
                                        echo "<label>\n";
                                        echo "<input type='radio' name='teacher' value='-1' checked> Преподаватель не привязан \n";
                                        echo "</label><br>";
                                    }else{
                                        echo "<label>\n";
                                        echo "<input type='radio' name='teacher' value='-1'> Преподаватель не привязан \n";
                                        echo "</label><br>";
                                    }
                                    $result_all_group = getAllData('teacher', $connection);
                                    if ($result_all_group->num_rows > 0) {

                                        while ($ross = $result_all_group->fetch_assoc()) {
                                            $t = false;
                                            if ($ross['id'] == $teacher_id) {
                                                echo "<label>\n";
                                                echo "<input type='radio' name='teacher' value='".$ross['id']."' checked> ".$ross['lastname']." ".$ross['firstname']." ".$ross['fathername']." \n";
                                                echo "</label><br>";
                                                $t = true;
                                            }
                                            
                                            if ($t != true) {
                                                echo "<label>\n";
                                                echo "<input type='radio' value='".$ross['id']."' name='teacher'> ".$ross['lastname']." ".$ross['firstname']." ".$ross['fathername']." \n";
                                                echo "</label><br>";
                                            }
                                        }
                                    }else{
                                        echo "Группы не добавлены";
                                    }
                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Предметы</label>
                                                                            <div style="max-height: 105px; overflow-y:scroll">
                                <?php
if ($subject == -1) {
    echo "<label>\n";
    echo "<input type='radio'  name='subject' value='-1' checked> Предмет не привязан\n";
    echo "</label><br>";
}else{
    echo "<label>\n";
    echo "<input type='radio'  name='subject' value='-1'> Предмет не привязан\n";
    echo "</label><br>";
} 
                                    $result_all_group = getAllData('subjects', $connection);
                                    if ($result_all_group->num_rows > 0) {
                                        while ($ross = $result_all_group->fetch_assoc()) {
                                            $t = false;
                                            if ($ross['name'] == $group_subject) {
                                            echo "<label>\n";
                                            echo "<input type='radio'  name='subject' value='".$ross['id']."' checked> ".$ross['name']."\n";
                                            echo "</label><br>";
                                            $t = true;
                                            }
                                            if ($t != true) {
                                                echo "<label>\n";
                                                echo "<input type='radio' name='subject' value='".$ross['id']."' name='checkboxnames[]'> ".$ross['name']."\n";
                                                echo "</label><br>";
                                            }
                                        }
                                    }else{
                                        echo "Группы не добавлены";
                                    }
                                ?>                                                                   



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
                                                                        <button type="button" id="saveNew<?php echo $shady; ?>" shady="<?php echo $shady; ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver_group" data-action="save" role="button">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                  </div>
                                            </div>

                                    </tr>
                            <?php             
                                    }
                                }else{

                                }
                            ?>
                            
                            <!-- Repeat -->
                            
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
    

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/spinn.js"></script>
    <script type="text/javascript" src="js/finder.js"></script>
    <script type="text/javascript" src="js/rwd-table.js"></script>
    <script type="text/javascript" src="js/update.js"></script>

</body>
</html>