<?php
session_start();

$db_name = $_SESSION['studycenter'];
include 'db/connect_db.php';
include 'db/get_all_data.php';
include 'db/get.php';
include 'db/get_query.php';

$connection->set_charset("utf8");
                                $result = getAllData('teacher', $connection);

                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) { 
                                        $shady++;
                                    ?>                                    
                                        <tr class="middlel" id="tr<?php echo $shady; ?>">
                                            <th><?php echo $row['lastname']." ".$row['firstname']; ?></th>
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
                                                                echo "<a href='admin_subjects.php?name=".$row_sb['name']."'>".$row_sb['name']."</a>, ";
                                                            }else{
                                                                echo "<a href='admin_subjects.php?name=".$row_sb['name']."'>".$row_sb['name']."</a>";
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
                                                            echo "<a href='admin_subjects.php?name=".$row_cl['name_group']."'>".$row_cl['name_group']."</a>, ";
                                                        }else{
                                                            echo "<a href='admin_subjects.php?name=".$row_cl['name_group']."'>".$row_cl['name_group']."</a>";
                                                        }
                                                        $data[$tempp - 1] = $row_cl['name_group'];
                                                    }
                                                }else{
                                                    echo "Группа не привязана";
                                                }
                                            ?>
                                            </td>
                                            <td>Enter to database</td>
                                            <td><?php echo $row['iin']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
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
                                }else{
                                    exit('No teachers in database');
                                }
                            ?>