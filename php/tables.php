<?php
	function tableStudent($connection, $cuni)
	{
		$result = getAllData('student', $connection);

		if ($result->num_rows > 0) {
			$shady = 0;
			while ($row = $result->fetch_assoc()) {
				$shady++;
			?>
			<tr class="middlel" id="tr<?= $shady ?>">
				
				<th><a href="admin_student_info?id=<?= $row['id'] ?>&name=<?= $row['firstname'] ?>"><?= $row['lastname']." ".$row['firstname']." ".$row['fathername'] ?></a></td>
				<td><?= $row['phone'] ?></td>
				<td><?= $row['phone_parent'] ?></td>
				<td><?= getGroupsOfStudent($row, $connection) ?>
					
				</td>
				<td><?= $row['iin'] ?></td>
				<td><?= getPassOfStudent($row, $cuni) ?></td>
				<td><?= getAge(date('d.m.Y'), $row['birthday']) ?> лет</td>
				<td>
						<button style="width: 25px; height: 25px" data-toggle="modal" data-target="#squarespaceModal<?= $shady ?>" type="button" class="btn btn-success btn-xs btn-update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
						<button shady="<?= $shady ?>" iin="<?= $row['iin'] ?>" student = "<?= $row['id'] ?>" style="width: 25px; height: 25px" type="button" class="btn btn-danger btn-xs delete_student"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
					
				</td>
				<div class="modal fade" id="squarespaceModal<?= $shady ?>" shady="<?= $shady ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span></button>
								<h3 class="modal-title" id="lineModalLabel">Введите новые значения</h3>
							</div>
							<form id="changeForm<?= $shady ?>" enctype="multipart/form-data">
								<div class="modal-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
				<label for="InputFirstname">Фамилия</label>
				<input type="text" name="surname" class="form-control" id="InputFirstname" placeholder="Введите фамилию" value="<?= $row['lastname'] ?>">
			  </div>
			</div>
			<div class="col-lg-4"> 
				<div class="form-group">
					<label for="InputName">Имя</label>
					<input name="name" type="text" class="form-control" id="InputName" placeholder="Введите Имя" value="<?= $row['firstname'] ?>">
				</div>
			</div>
			<div class="col-lg-4"> 
				<div class="form-group">
					<label for="InputFathername">Отчество</label>
					<input name="fathername" type="text" class="form-control" id="InputFathername" placeholder="Отчество" value="<?= $row['fathername'] ?>">
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label for="InputTele">Номер телефона</label>
					<input name="tele" type="text" class="form-control" id="InputTele" placeholder="Отчество" value="<?= $row['phone'] ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label for="InputTeleP">Номер родителей</label>
					<input name="tele_rod" type="text" class="form-control" id="InputTeleP" placeholder="Отчество" value="<?= $row['phone_parent'] ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label for="IIIN">ИИН</label>

					<input name="iin" type="text" class="form-control" placeholder="Отчество" value="<?= $row['iin'] ?>">
					<input name="id" type="text" style="display: none" value="<?= $row['id'] ?>">
					<input name="iznoo" type="text" style="display: none" id="IIIN"  value="<?= $row['iin'] ?>">
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="dayb">День рождения</label>
					<input name="birthday" type="text" class="form-control" id="dayb" placeholder="День рождения" value="<?= $row['birthday'] ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Группы</label>
					<div style="max-height: 105px; overflow-y:scroll">
																						<?= getGroupsForStudentUpdate($row, $connection) ?>
					</div>
				</div>
			</div>
		</div>

									</div>
									<div class="modal-footer">
		<div class="btn-group btn-group-justified" role="group" aria-label="group button">
			<div class="btn-group" role="group">
				<button type="button" id="closeNew" class="btn btn-default closer" data-dismiss="modal"  role="button">Закрыть</button>
			</div>
			<div class="btn-group" role="group">
				<button type="button" id="saveNew<?= $shady ?>" shady="<?= $shady ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver" data-action="save" role="button">Сохранить</button>
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
		}
	}

function tableTeacher($connection, $cuni)
{
    $result = getAllData('teacher', $connection);

    if ($result->num_rows > 0) {
        $shady = 0;
        while ($row = $result->fetch_assoc()) { 
            $shady++;
        ?>        
            <tr class="middlel" id="tr<?php echo $shady; ?>">
                <th><a href="teachers_schedule?id=<?= $row['id'] ?>&name=<?php echo $row['lastname']." ".$row['firstname']; ?>"><?php echo $row['lastname']." ".$row['firstname']; ?></a></th>
                <td><?= $row['telephone'] ?></td>
                <td><?= getAge(date('d.m.Y'),$row['birthday']) ?></td>
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
                <td><?= $row['iin'] ?></td>
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
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span></button>
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
                <button type="button" id="closeNew" class="btn btn-default closer" data-dismiss="modal"  role="button">Закрыть</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="saveNew<?php echo $shady; ?>" shady="<?php echo $shady; ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver_teacher" data-action="save" role="button">Сохранить</button>
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
}

function tableSubject($connection, $cuni)
{
    $result = getAllData('subjects', $connection);

    if ($result->num_rows > 0) {
        $shady = 0;
        while ($row = $result->fetch_assoc()) { 
            $shady++;
        ?>
        
            <tr class="middlel" id="tr<?php echo $shady; ?>">
                <th><?php echo $row['name']?></th>
                <td>
                <?php 
                    $query_group = "subject = ".$row['id'];
                    $result_groups = get_query($query_group, 'class', $connection);

                    if($result_groups->num_rows > 0){
                        $temp = 0;
                        while ($row_groups = $result_groups->fetch_assoc()) {
$temp++;
if($temp < $result_groups->num_rows){
    echo $row_groups['name_group'].", ";
}else{
    echo $row_groups['name_group'];
}
                        }
                    }else{
                        echo "Нет привязанныч групп";
                    }

                ?>
                    
                </td>
                <td>
                 <?php 
                    $query_ts = "id_s = ".$row['id'];
                    $result_ts = get_query($query_ts, 'relation_ts', $connection);

                    if($result_ts->num_rows > 0){
                        $tess = 0;
                        while ($row_groups = $result_ts->fetch_assoc()) {
$query_te = "id = ".$row_groups['id_t'];
$result_te = get_query($query_te, 'teacher', $connection);


$row_teachers = $result_te->fetch_assoc(); 
    $tess++;
    if($tess < $result_ts->num_rows){
																echo "<a href='admin_teachers?name=".$row_teachers['firstname']." ".$row_teachers['lastname']."'>".$row_teachers['firstname']." ".$row_teachers['lastname']."</a>, ";
    }else{
        echo "<a href='admin_teachers?name=".$row_teachers['firstname']." ".$row_teachers['lastname']."'>".$row_teachers['firstname']." ".$row_teachers['lastname']."</a>";
    }

                        }
                    }else{
                        echo "Нет обучающих учителей";
                    }
                ?>

                </td>
                <td>
                    <button style="width: 25px; height: 25px" shady="<?php echo $shady; ?>" subject="<?php echo $row['id']; ?>" type="button" class="btn btn-danger btn-xs delete_subject"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                </td>
            </tr>

<?php   }
    }
}

function tableGroup($connection, $cuni)
{
    $result = getAllData('class', $connection);
    if ($result->num_rows > 0) {
        $shady = 0;
        while ($row = $result->fetch_assoc()) { 
            $shady++;
        ?>
        <tr class="middlel" id="tr<?php echo $shady; ?>">
        <th><a href="schedule_admin?id=<?php echo $row['schedule']; ?>"><?php echo $row['name_group']; ?></a></th>
        <td><?php 
            $teacher_id = -1;
            if ($row['teacher_id']!=null) {
                $query = "id = ".$row['teacher_id'];
                $teacher = get_query($query, 'teacher', $connection);
                $row_teacher = $teacher->fetch_assoc();
                echo "<a href='admin_teachers?name=".$row_teacher['firstname']." ".$row_teacher['lastname']."'>".$row_teacher['firstname']." ".$row_teacher['lastname']." ".$row_teacher['fathername']."</a>";
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
                        echo "<li><a href='admin_studens?name=".$row_student['firstname']." ".$row_student['lastname']."'>".$row_student['firstname']." ".$row_student['lastname']."</a></li>";
                    }
                }else{
                    echo "Ученики не привязаны";
                }                
            ?>
            </ul>
        </td>
                <td>
                    <button style="width: 25px; height: 25px" data-toggle="modal" data-target="#squarespaceModal<?php echo $shady; ?>" type="button" class="btn btn-success btn-xs btn-update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                    <button style="width: 25px; height: 25px" type="button" group="<?php echo $row['id']; ?>" schedule="<?php echo $row['schedule']; ?>" shady="<?php echo $shady; ?>" class="btn btn-danger btn-xs delete_group"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                </td>

                <div class="modal fade" id="squarespaceModal<?php echo $shady; ?>" shady="<?php echo $shady; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span></button>
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
                <button type="button" id="closeNew" class="btn btn-default closer" data-dismiss="modal"  role="button">Закрыть</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="saveNew<?php echo $shady; ?>" shady="<?php echo $shady; ?>" data-dismiss="modal" class="btn btn-default btn-hover-green saver_group" data-action="save" role="button">Сохранить</button>
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
}
?>