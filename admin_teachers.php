<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include 'php/connectOS.php';

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
    <?php include "php/headers/admin.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список учителей</h2>
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
                                <th>Ф.И.О</th>
                                <th data-priority="1">Номер телефона</th>
                                <th data-priority="1">Дата рождения</th>
                                <th data-priority="1">Уроки</th>
                                <th data-priority="1">Группы</th>
                                <th data-priority="1">ИИН</th>
                                <th data-priority="1">Пароль</th>
                                <th></th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody id="ok">
                            <?php 
                                $result = getAllData('teacher', $connection);

                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) { 
                                        $shady++;
                                    ?>                                    
                                        <tr class="middlel" id="tr<?php echo $shady; ?>">
                                            <th><a href="teachers_schedule?id=<?php echo $row['id']; ?>&name=<?php echo $row['lastname']." ".$row['firstname']; ?>"><?php echo $row['lastname']." ".$row['firstname']; ?></a></th>
                                            <td><?php echo $row['telephone']; ?></td>
                                            <td><?php echo $row['birthday']; ?></td>
                                            <td><?php 
                                                $data_subjects = array();
                                                $query = "id_t = ".$row['id'];
                                                $result_ts = get_query($query, 'relation_ts', $connection);
                                                if ($result_ts->num_rows > 0) {
                                                    $temp = 0;
                                                    while ($row_ts = $result_ts->fetch_assoc()) {
                                                        $temp++;
                                                        $query_s = "id = ".$row_ts['id_s'];
                                                        $result_sb = get_query($query_s, 'subjects', $connection);
                                                        while ($row_sb = $result_sb->fetch_assoc()) {
                                                            if ($temp < $result_ts->num_rows) {
                                                                echo "<a href='admin_subjects?name=".$row_sb['name']."'>".$row_sb['name']."</a>, ";
                                                            }else{
                                                                echo "<a href='admin_subjects?name=".$row_sb['name']."'>".$row_sb['name']."</a>";
                                                            }
                                                            $data_subjects[$temp - 1] = $row_sb['name'];
                                                        }
                                                    }
                                                }else{
                                                    echo "Предмет не выбран";
                                                }
                                                // print_r($data_subjects);
                                            ?>
                                            </td>
                                            <td>
                                            <?php 
                                                $data = array();
                                                $query_for_class = "teacher_id = ".$row['id'];
                                                $result_cl = get_query($query_for_class, 'class', $connection);
                                                if($result_cl->num_rows > 0){
                                                    $tempp = 0;
                                                    while ($row_cl = $result_cl->fetch_assoc()) {
                                                        $tempp++;
                                                        if ($tempp < $result_cl->num_rows) {
                                                            echo "<a href='admin_subjects?name=".$row_cl['name_group']."'>".$row_cl['name_group']."</a>, ";
                                                        }else{
                                                            echo "<a href='admin_subjects?name=".$row_cl['name_group']."'>".$row_cl['name_group']."</a>";
                                                        }
                                                        $data[$tempp - 1] = $row_cl['name_group'];
                                                    }
                                                }else{
                                                    echo "Группа не привязана";
                                                }
                                            ?>
                                            </td>
                                            <td><?php echo $row['iin']; ?></td>
                                            <td>
											<?php
												$sql9 = "SELECT * FROM users";
												$result9 = $cuni->query($sql9);

												if ($result9->num_rows > 0) {
													// output data of each row
													while($row9 = $result9->fetch_assoc()) {
														if($row['iin'] == $row9['iin']){
															echo $row9['password'];
														}
													}
												}
											?>
											</td>
                                            <td>
                                                <button style="width: 25px; height: 25px" data-toggle="modal" data-target="#squarespaceModal<?php echo $shady; ?>" type="button" class="btn btn-success btn-xs btn-update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                                <button shady="<?php echo $shady; ?>" iin = "<?php echo $row['iin']; ?>" teacher = "<?php echo $row['id']; ?>" style="width: 25px; height: 25px" type="button" class="btn btn-danger btn-xs delete_teacher"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
                                                                            <input name="iin" type="text" class="form-control" placeholder="ИИН" value="<?php echo $row['iin']; ?>">
                                                                            <input name="id" type="text" style="display: none" value="<?php echo $row['id']; ?>">
                                                                            <input name="iznoo" type="text" style="display: none" id="IIIN"  value="<?php echo $row['iin']; ?>">
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
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Группы</label>
                                                                            <div style="max-height: 105px; overflow-y:scroll">
                                <?php 
                                    $result_all_group = getAllData('class', $connection);
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
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Предметы</label>
                                                                            <div style="max-height: 105px; overflow-y:scroll">
                                <?php 
                                    $result_all_group = getAllData('subjects', $connection);
                                    if ($result_all_group->num_rows > 0) {
                                        while ($ross = $result_all_group->fetch_assoc()) {
                                            $t = false;
                                            if (sizeof($data_subjects) > 0) {
                                                for($y=0; $y < sizeof($data_subjects); $y++){
                                                    if ($ross['name'] == $data_subjects[$y]) {
                                                        echo "<label>\n";
                                                        echo "<input type='checkbox' atta='".$ross['id']."' name='checkboxnames[]' value='".$ross['name']."' checked> ".$ross['name']."\n";
                                                        echo "</label><br>";
                                                        $t = true;
                                                    }
                                                }   
                                            }
                                            if ($t != true) {
                                                echo "<label>\n";
                                                echo "<input type='checkbox' atta='".$ross['id']."' value='".$ross['name']."' name='checkboxnames[]'> ".$ross['name']."\n";
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