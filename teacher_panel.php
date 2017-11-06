<?php 
session_start();

$db_name = $_SESSION['studycenter'];

if (isset($_GET['tele'])) {
    $iin_b = FALSE;
    $tele = $_GET['tele'];
}
else{
    $iin_b = TRUE;
    $iin = $_GET['iin'];
}
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';

$connection->set_charset("utf8");

$result = getAllData('about', $connection);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thousand - Admin Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">    

    <link href="css/plugins/morris.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/custum.css">

    <link rel="stylesheet" type="text/css" href="css/teacher.css">
</head>

<body>

    <div>

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
                <a class="navbar-brand" href="admin_panel.php"><?php echo $row['name']; ?></a>
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
           
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container">

                <div class="row">
                    <div>
                        <div class="col-lg-6">

                                
                            <div class="panel panel-default">
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

                            </div>
                            <div class="jjournal-panel-top">
                                <p class="jjournal-orange">Предстоящие занятия</p>
                                <p class="jjournal-orange" style="float: right"><a href="">Посмотреть расписание</a></p>
                            </div>
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
                    <div class="col-lg-6">
                        <div class="jjournal-panel-top">
                            <p class="jjournal-green">Предстоящие дни рождения</p>
                           <?php 
                                if ($iin_b) {
                                    $query_t = "iin = ".$iin;
                                }else{
                                    $query_t = "telephone = ".$tele;
                                }
                                $data = get_query($query_t, "teacher", $connection);
                                $teacher_d = $data->fetch_assoc();
                                // end teacher data taking
                                $fathername_t = $teacher_d['fathername'];
                                $id_t = $teacher_d['id'];
                                $query_c = "teacher_id = ".$id_t;
                                $data_groups = get_query($query_c, "class", $connection);
                                $students_b = array();
                                $order = 0;
                                while ($data_group = $data_groups->fetch_assoc()) {
                                    $id_g = $data_group['id'];
                                    $query_ccs = "class_id = ".$id_g;
                                    $relation_cs = get_query($query_ccs, "relation_cs", $connection);
                                    while ($relation_cs_s = $relation_cs->fetch_assoc()) {
                                        $student_id = $relation_cs_s['student_id'];
                                        $query_s = "id = ".$student_id;
                                        $student_d = get_query($query_s, "student", $connection);
                                        $single_student_d = $student_d->fetch_assoc();
                                        $students_b[$order] = $single_student_d['birthday'];
                                        $order++;
                                    }
                                }   
                                print_r($students_b);
                            ?>
                        </div>
                        <ul class="jjournal-orders">
                            
                        </ul>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div> -->

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        
                    </div>
                    
                </div>
                
                <div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
