<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';

	$connection->set_charset("utf8");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Студенты</title>

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
                <a class="navbar-brand" href="admin_panel.php">SB Admin</a>
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
                    <li class="active">
                        <a  class="jjournal-white" href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Студенты</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="tables.html"><i class="fa fa-fw fa-table"></i> Учетели</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список студентов</h2>
                    </div>
                    <div>
                        <p>Искать</p>
                        <input type="text" class="search form-control" placeholder="Введите что вы ищете">
                        <span class="counter pull-right"></span>

                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                            <thead>
                                <tr>
                                    <th>Ф.И.О</th>
                                    <th data-priority="1">Номер телефона</th>
                                    <th data-priority="1">Номер родителей</th>
                                    <th data-priority="1">Группы</th>
                                    <th data-priority="1">День Оплаты</th>
                                    <th data-priority="1">ИИН</th>
                                    <th data-priority="1">День Рождения</th>
                                </tr>
                                <tr class="warning no-result">
                                  <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $result = getAllData('student', $connection);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <th><?php echo $row['lastname']." ".$row['firstname']; ?></th>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['phone_parent']; ?></td>
                                            <td>

                                            <?php 
                                                $data = array();
                                                $q = "student_id = ".$row['id'];
                                                $result_groups = get_query($q, 'relation_cs', $connection);
                                                if($result_groups->num_rows > 0){

                                                    $order = 0;
                                                    while ($row_cs = $result_groups->fetch_assoc()) {
                                                        $qo = "id = ".$row_cs['class_id'];
                                                        $result_group = get_query($qo, 'class', $connection);
                                                        while ($row_group = $result_group->fetch_assoc()) {
                                                            $data[$order] = $row_group['name_group'];
                                                        }
                                                        $order++;
                                                    }
                                                    for ($i=0; $i < $order; $i++) {
                                                        if($i == $order-1){
                                                            echo "<a href =''>".$data[$i]."</a>";
                                                        }else{
                                                            echo "<a href='' >".$data[$i]."</a>, ";
                                                        }                                                    
                                                    }
                                                }else{
                                                    echo 'Группы не привязаны';
                                                }
                                            ?>
                                                
                                            </td>
                                            <td><?php echo $row['payday']; ?></td>
                                            <td><?php echo $row['iin']; ?></td>
                                            <td><?php echo $row['birthday']; ?></td>
                                        <tr>
                                <?php   }
                                    }else{
                                        exit('No teachers in database');
                                    }
                                ?>
                                <tr>
                                    <th>Айя Мирзакул</th>         
                                <td>87014895623</td>
                                <td>87051581895</td>
                                <td>Стриптиз ПРО</td>
                                <td>18.06.2017</td>
                                <td>991205351418</td>
                                <td>25.01.1998</td>
                                </tr>
                                <tr>
                                    <th>Айя Мирзакул</th>         
                                <td>87014895623</td>
                                <td>87051581895</td>
                                <td>Стриптиз ПРО</td>
                                <td>18.06.2017</td>
                                <td>991205351418</td>
                                <td>25.01.1998</td>
                                </tr>
                                <tr>
                                    <th>Айя Мирзакул</th>         
                                <td>87014895623</td>
                                <td>87051581895</td>
                                <td>Стриптиз ПРО</td>
                                <td>18.06.2017</td>
                                <td>991205351418</td>
                                <td>25.01.1998</td>
                                </tr>
                                <tr>
                                    <th>Айя Мирзакул</th>         
                                <td>87014895623</td>
                                <td>87051581895</td>
                                <td>Стриптиз ПРО</td>
                                <td>18.06.2017</td>
                                <td>991205351418</td>
                                <td>25.01.1998</td>
                                </tr>
                                <tr>
                                    <th>Айя Мирзакул</th>         
                                <td>87014895623</td>
                                <td>87051581895</td>
                                <td>Стриптиз ПРО</td>
                                <td>18.06.2017</td>
                                <td>991205351418</td>
                                <td>25.01.1998</td>
                                </tr>

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

    <script type="text/javascript" src="js/finder.js"></script>
    <script type="text/javascript" src="js/rwd-table.js"></script>

</body>
</html>