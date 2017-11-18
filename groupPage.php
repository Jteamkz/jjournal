<?php 
session_start();
$db_name = $_SESSION['studycenter'];

include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/SQLconnect.php';
include 'php/connectOS.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/teacher.css" type="text/css">
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <?php 
            include 'php/SQLconnect.php';
            include 'php/connectOS.php';
        ?>
        <script>
            $(document).ready(function(){
                $("#toggling").hide();
                $("#toggler").click(function(){
                    $("#toggling").slideToggle(800);
                });
            var array = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
            for(var i = 0; i<7; i++){
                document.getElementById(array[i] + "room").disabled = true;
                document.getElementById(array[i] + "room").name = array[i] + "room";
                document.getElementById(array[i] + "1").disabled = true;
                document.getElementById(array[i] + "1").name = array[i] + "1";
                document.getElementById(array[i] + "2").disabled = true; 
                document.getElementById(array[i] + "2").name = array[i] + "2";
                document.getElementById(array[i] + "3").disabled = true; 
                document.getElementById(array[i] + "3").name = array[i] + "3";
                document.getElementById(array[i] + "4").disabled = true; 
                document.getElementById(array[i] + "4").name = array[i] + "4";
            }
                $(".dender input[type=checkbox]").click(function(){
                        var id = $(this).val();
                        
                        if(document.getElementById(id + "Check").checked==true){
                            document.getElementById(id + "Check").checked= false;
                            document.getElementById(id + "room").disabled = true; 
                            document.getElementById(id + "1").disabled = true; 
                            document.getElementById(id + "2").disabled = true; 
                            document.getElementById(id + "3").disabled = true; 
                            document.getElementById(id + "4").disabled = true; 
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                        }else{
                        	document.getElementById(id + "room").disabled = false; 
                            document.getElementById(id + "1").disabled = false; 
                            document.getElementById(id + "2").disabled = false; 
                            document.getElementById(id + "3").disabled = false; 
                            document.getElementById(id + "4").disabled = false;
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                            document.getElementById(id + "Check").checked = true;
                        }
                });
                $(".jjournal-orders input[type=checkbox]").click(function(){
                        var id = $(this).val();
                        console.log(id);
                        if(document.getElementById("checkSt" + id).checked==true){
                            document.getElementById("checkSt" + id).checked= false;
                        }else{
                            document.getElementById("checkSt" + id).checked = true;
                        }
                });
                $("li").click(function(){
                        var id = $(this).attr('id');
                        if(document.getElementById("checkSt" + id).checked==true){
                            document.getElementById("checkSt" + id).checked= false;
                        }else{
                            document.getElementById("checkSt" + id).checked = true;
                        }
                });
                $("H5").click(function(){
                        var id = $(this).attr('shama');
                        if(document.getElementById(id + "Check").checked==true){
                            document.getElementById(id + "Check").checked= false;
                            document.getElementById(id + "room").disabled = true; 
                            document.getElementById(id + "1").disabled = true; 
                            document.getElementById(id + "2").disabled = true; 
                            document.getElementById(id + "3").disabled = true; 
                            document.getElementById(id + "4").disabled = true; 
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                        }else{
                        	document.getElementById(id + "room").disabled = false; 
                            document.getElementById(id + "1").disabled = false; 
                            document.getElementById(id + "2").disabled = false; 
                            document.getElementById(id + "3").disabled = false; 
                            document.getElementById(id + "4").disabled = false;
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                            document.getElementById(id + "Check").checked = true;
                        }
                });
            });
</script>
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

                <div class="formGroupAdding">
    <form method="post" action="add/groupAdd.php">
        <div class="row">
            <div class="col-lg-8">
        <input type="text" placeholder="Название группы" name="name">
        <select style="" name="subject" required>
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
    <style>
        .dender{
            height:100px;
        }
    </style>
        <div class="row">
            <div class="col-lg-4">
                <div class="dender">
        <h5 shama='monday' class="togglerH5" id="mondayToggler">Понедельник <input id="mondayCheck" value="monday" style="float:right;" type="checkbox"></h5>
                <div id="mondayDiv">
                    <input type="text" placeholder="Кабинет" id="mondayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="monday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="monday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="monday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="monday4" maxlength="2">
                </div>
            </div>
            </div>
            <div class="col-xs-4">
                <div class="dender">
                <h5 shama='tuesday' class="togglerH5" id="tuesdayToggler">Вторник <input id="tuesdayCheck" style="float:right;" value="tuesday" type="checkbox"></h5>
                <div id="tuesdayDiv">
                    <input type="text" placeholder="Кабинет" id="tuesdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="tuesday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="tuesday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="tuesday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="tuesday4" maxlength="2">
                </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="dender">
                <h5 shama='wednesday' class="togglerH5" id="wednesdayToggler">Среда <input id="wednesdayCheck" style="float:right;" value="wednesday" type="checkbox"></h5>
                <div id="wednesdayDiv">
                    <input type="text" placeholder="Кабинет" id="wednesdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="wednesday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="wednesday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="wednesday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="wednesday4" maxlength="2">
                </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="dender">
                <h5 shama='thursday' class="togglerH5" id="thursdayToggler">Четверг <input id="thursdayCheck" style="float:right;" value="thursday" type="checkbox"></h5>
                <div id="thursdayDiv">
                    <input type="text" placeholder="Кабинет" id="thursdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="thursday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="thursday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="thursday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="thursday4" maxlength="2">
                </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="dender">
                <h5 shama='friday' class="togglerH5" id="fridayToggler">Пятница <input id="fridayCheck" style="float:right;" value="friday" type="checkbox"></h5>
                <div id="fridayDiv">
                    <input type="text" placeholder="Кабинет" id="fridayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="friday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="friday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="friday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="friday4" maxlength="2">
                </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="dender">
                <h5 shama='saturday' class="togglerH5" id="saturdayToggler">Суббота <input id="saturdayCheck" style="float:right;" value="saturday" type="checkbox"></h5>
                <div id="saturdayDiv">
                    <input type="text" placeholder="Кабинет" id="saturdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="saturday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="saturday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="saturday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="saturday4" maxlength="2">
                </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="dender">
                <h5 shama='sunday' class="togglerH5" id="sundayToggler">Воскресенье <input id="sundayCheck" style="float:right;" value="sunday" type="checkbox"></h5>
                <div id="sundayDiv">
                    <input type="text" placeholder="Кабинет" id="sundayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="sunday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="sunday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="sunday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="sunday4" maxlength="2">
                </div>
            </div>
            </div>
        </div>
        </div>
        Выберите учеников<br>
        <div class="col-lg-4" style='background-color: white;padding:0px;'>
            <div style="overflow-y:scroll; min-height:400px; max-height:400px;">
        <?php
                $sql = "SELECT * FROM student WHERE bool='true'";
                $result = $con->query($sql);
                echo "<ul class='jjournal-orders'>";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='".$row['id']."'>".$row['firstname']." ".$row['lastname']." ".$row['father']."<input name='checkbox[]' id='checkSt".$row['id']."' type='checkbox' style='float:right; margin-right:10px;' value='".$row['id']."'/>"."</li>"."";
                    }
                } else {
                    
                }
                echo "</ul>";
                echo "<a id='toggler'>Показать все</a><br>";
                $sql = "SELECT * FROM student WHERE bool='false'";
                $result = $con->query($sql);
                    echo "<div id='toggling'>";
                    echo "<ul class='jjournal-orders'>";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='".$row['id']."'>".$row['firstname']." ".$row['lastname']." ".$row['father']."<input name='checkbox[]' id='checkSt".$row['id']."' type='checkbox' style='float:right; margin-right:10px;' value='".$row['id']."'/>"."</li>"."";
                    }
                } else {
                    
                }
                echo "</ul>";
                echo "</div>";
            ?>
        </div>
    </div>
        </div>
    </div>
        <button style="float:right; border-radius: 0px; color:white; margin-top:15px; background-color: #2ecc71" class="btn">Добавить группу</button>
        </form>
    </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="js/jquery.js"></script>

    <script src="js/actions.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>

</html>
