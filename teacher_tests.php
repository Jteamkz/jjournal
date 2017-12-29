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
                        <a class="jjournal-white" href="teacher_panel.php"><i class="fa fa-fw fa-dashboard"></i> Панель управления</a>
                    </li>
                    <li >
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
                    <li class="active">
                        <a  class="jjournal-white" href="#"><i class="fa fa-fw fa-wrench"></i> Тесты</a>
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
                        <h2>Список тестов</h2>
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
                                $result = getAllData('tests', $connection);

                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) { 
                                        $shady++;
                                    ?>                                    
                                        <tr class="middlel" id="tr<?php echo $shady; ?>">
                                            <th><?php echo $row['name']; ?></th>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['numberquests']; ?></td>
                                            <td><?php 
                                                $data_groups = array();
                                                $query = "test_id = ".$row['id'];
                                                $result_gt = get_query($query, 'relation_gt', $connection);
                                                if ($result_gt->num_rows > 0) {
                                                    $temp = 0;
                                                    while ($row_gt = $result_gt->fetch_assoc()) {
                                                        $temp++;
                                                        $query_s = "id = ".$row_gt['group_id'];
                                                        $result_sb = get_query($query_s, 'class', $connection);
                                                        while ($row_sb = $result_sb->fetch_assoc()) {
                                                            if ($temp < $result_ts->num_rows) {
                                                                echo "<a href='admin_groups.php?name=".$row_sb['name_group']."'>".$row_sb['name_group']."</a>, ";
                                                            }else{
                                                                echo "<a href='admin_groups.php?name=".$row_sb['name_group']."'>".$row_sb['name_group']."</a>";
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
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                        <label for="InputFirstname">Фамилия</label>
                                                                        <input type="text" name="surname" class="form-control" id="InputFirstname" placeholder="Введите фамилию" value="<?php echo $row['lastname']; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-lg-4"> 
                                                                        <div class="form-group">
                                                                            <label for="InputName">Имя</label>
                                                                            <input name="name" type="text" class="form-control" id="InputName" placeholder="Введите Имя" value="<?php echo $row['firstname']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4"> 
                                                                        <div class="form-group">
                                                                            <label for="InputFathername">Отчество</label>
                                                                            <input name="fathername" type="text" class="form-control" id="InputFathername" placeholder="Отчество" value="<?php echo $row['fathername']; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="InputTele">Номер телефона</label>
                                                                            <input name="tele" type="text" class="form-control" id="InputTele" placeholder="Номер телефона" value="<?php echo $row['telephone']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="IIIN">ИИН</label>
                                                                            <input name="iin" type="text" class="form-control" id="IIIN" placeholder="ИИН" value="<?php echo $row['iin']; ?>">
                                                                            <input name="id" type="text" style="display: none" value="<?php echo $row['id']; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="dayb">День рождения</label>
                                                                            <input name="birthday" type="text" class="form-control" id="dayb" placeholder="День рождения" value="<?php echo $row['birthday']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="pass">Пароль для входа в систему</label>
                                                                            <input name="password" type="text" class="form-control" id="pass" placeholder="Пароль для входа в систему" value="<?php echo $row['password']; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Группы</label>
                                                                            <div style="max-height: 105px; overflow-y:scroll">
                                <?php 
                                    $result_all_group = getAllData('relation_gt', $connection);
                                    if ($result_all_group->num_rows > 0) {
                                        while ($ross = $result_all_group->fetch_assoc()) {
                                            $t = false;
                                            if (sizeof($data) > 0) {
                                                for($y=0; $y < sizeof($data); $y++){
                                                    if (($ross['name_group'] == $data[$y])) {
                                                        echo "<label>\n";
                                                        echo "<input type='checkbox' atta='".$ross['id']."' name='checkboxname[]' value='".$ross['name_group']."' checked> ".$ross['name_group']."\n";
                                                        echo "</label><br>";
                                                        $t = true;
                                                    }
                                                }   
                                            }
                                            if (($t != true) && (is_null($ross['teacher_id']))) {
                                                echo "<label>\n";
                                                echo "<input type='checkbox' atta='".$ross['id']."' value='".$ross['name_group']."' name='checkboxname[]'> ".$ross['name_group']."\n";
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
                                                                        <button type="button" id="saveNew<?php echo $shady; ?>" shady="<?php echo $shady; ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver_teacher" data-action="save" role="button">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                  </div>
                                            </div>
                                        </tr>

                            <?php   }
                                }else{
                                    exit('No tests in database');
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
    <script type="text/javascript" src="js/delete.js"></script>
</body>
</html>