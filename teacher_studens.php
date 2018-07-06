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
<?php include "php/head.php"; ?>
<body>


<div id="wrapper">
  <?php include "php/headers/teacher.php"; ?>

    <div id="page-wrapper">
        <!-- line modal -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список студентов</h2>
                    </div>
                    <div>
                        <p>Искать</p>
                        <input type="text" class="search form-control" placeholder="Введите что вы ищете" value="<?php 
                            if (isset($_GET['name'])) {
                                echo $_GET['name'];
                            }
                        ?>">
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
                                    <th data-priority="1">ИИН</th>
                                    <th data-priority="1">Пароль</th>
                                    <th data-priority="1">День Рождения</th>
                                    <th></th>
                                </tr>
                                <tr class="warning no-result">
                                  <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    
                                    $result = getAllData('student', $connection);

                                    if ($result->num_rows > 0) {
                                        $shady = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $shady++;
                                        ?>
                                        <tr class="middlel" id="tr<?php echo $shady; ?>">
                                            
                                            <th><?php echo $row['lastname']." ".$row['firstname']." ".$row['fathername']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['phone_parent']; ?></td>
                                            <td>

                                            <?php 
                                                $data = array();
                                                $q = "student_id = ".$row['id'];
                                                $result_groups = get_query($q, 'relation_cs', $connection);
                                                $order = 0;

                                                if($result_groups->num_rows > 0){

                                                    // print_r($result_groups);
                                                    while ($row_cs = $result_groups->fetch_assoc()) {
                                                        $qo = "id = ".$row_cs['class_id'];
                                                        $result_group = get_query($qo, 'class', $connection);
                                                        while ($row_group = $result_group->fetch_assoc()) {
                                                            $data[$order] = $row_group['name_group'];
                                                        }
                                                        $order++;
                                                    }
                                                    // print_r($data);
                                                    for ($i=0; $i < $order; $i++) {
                                                        if($i == $order-1){
                                                            echo "<a href ='admin_groups?name=".$data[$i]."'>".$data[$i]."</a>";
                                                        }else{
                                                            echo "<a href='admin_groups?name=".$data[$i]."' >".$data[$i]."</a>, ";
                                                        }                                                    
                                                    }
                                                }else{
                                                    echo 'Группы не привязаны';
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
															break;
														}
													}
												}
											?>
											</td>
                                            <td><?php echo $row['birthday']; ?></td>
                                            <td>
                                                    <button style="width: 25px; height: 25px" data-toggle="modal" data-target="#squarespaceModal<?php echo $shady; ?>" type="button" class="btn btn-success btn-xs btn-update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                                    <button shady="<?php echo $shady; ?>" iin="<?php echo $row['iin']; ?>" student = "<?php echo $row['id']; ?>" style="width: 25px; height: 25px" type="button" class="btn btn-danger btn-xs delete_student"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                                
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
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <label for="InputTele">Номер телефона</label>
                                                                            <input name="tele" type="text" class="form-control" id="InputTele" placeholder="Отчество" value="<?php echo $row['phone']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <label for="InputTeleP">Номер родителей</label>
                                                                            <input name="tele_rod" type="text" class="form-control" id="InputTeleP" placeholder="Отчество" value="<?php echo $row['phone_parent']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <label for="IIIN">ИИН</label>

                                                                            <input name="iin" type="text" class="form-control" placeholder="Отчество" value="<?php echo $row['iin']; ?>">
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
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Группы</label>
                                                                            <div style="max-height: 105px; overflow-y:scroll">
                                                                    <?php 
                                                                    $result_all_group = getAllData('class', $connection);
                                                                    if ($result_all_group->num_rows > 0) {
                                                                        while ($ross = $result_all_group->fetch_assoc()) {
                                                                        $t = false;
                                                                        if ($order > 0) {
                                                                            for($y=0; $y < $order; $y++){
                                                                                if ($ross['name_group'] == $data[$y]) {
                                                                                    echo "<label>\n";
                                                                                    echo "<input type='checkbox' atta='".$ross['id']."' name='checkboxname[]' value='".$ross['name_group']."' checked> ".$ross['name_group']."\n";
                                                                                    echo "</label><br>";
                                                                                    $t = true;
                                                                                }
                                                                            }   
                                                                        }
                                                                        
                                                                        if ($t != true) {
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
                                                                    <!--
                                                                    <div class="btn-group btn-delete" role="group">
                                                                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                                                    </div>-->
                                                                    <div class="btn-group" role="group">
                                                                        <button type="button" id="saveNew<?php echo $shady; ?>" shady="<?php echo $shady; ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver" data-action="save" role="button">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                  </div>
                                            </div>
                                        <tr>





                                <?php
                                unset($order);
                                   }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                
                <br>
                <br>


            </div>
    </div>
</div>
    

   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
 
    <script type="text/javascript" src="js/spinn.js"></script>
    <script type="text/javascript" src="js/finder.js"></script>
    <script type="text/javascript" src="js/rwd-table.js"></script>
    <script type="text/javascript" src="js/update.js"></script>
    <script type="text/javascript" src="js/delete.js"></script>
</body>
</html>