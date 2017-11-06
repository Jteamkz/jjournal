<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'db/connect_db.php';
include 'db/get_all_data.php';
include 'db/get.php';
include 'db/get_query.php';

    $connection->set_charset("utf8");

$shady = $_GET['shady'];
$id = $_GET['izno'];

$name = $_POST['name'];
$teacher = $_POST['teacher'];
$subject = $_POST['subject'];
$subect = -2;
if ($teacher == -1) {
    if ($subject == -1) {
        $update_query = "UPDATE class SET name_group = '$name', teacher_id = null, subject = null WHERE id = '$id'";
        $subect = -1;
    }else{
        $update_query = "UPDATE class SET name_group = '$name', teacher_id = null, subject = '$subject' WHERE id = '$id'";
    }
}else{
    if ($subject == -1) {
        $update_query = "UPDATE class SET name_group = '$name', teacher_id = '$teacher', subject = null WHERE id = '$id'";
        $subect = -1;
    }else{
        $update_query = "UPDATE class SET name_group = '$name', teacher_id = '$teacher', subject = '$subject' WHERE id = '$id'";
    }
}
$teacher_data = "SELECT * FROM teacher WHERE id='$teacher'";
$subject_data = "SELECT * FROM subjects WHERE id='$subject'";
if ($connection->query($update_query) === TRUE) {
    if ($teacher != -1) {
        $aible = $connection->query($teacher_data);
        $showme = $aible->fetch_assoc();

        $all = "<a href='admin_teachers.php'>".$showme['lastname']." ".$showme['firstname']." ".$showme['fathername']."</a>";
    }else{
        $all = "Учитель не привязан";
    }
    $subect = 0;
	$lll = $connection->query($subject_data);
	$zhk = $lll->fetch_assoc();
    if (is_null($zhk['name'])) {
        $subect = "-1";
    }


echo "
    <th>".$name."</th>
    <td>";
    echo $all;
echo "</td>
    <td>";
    if ($subect == -1) {
        echo "Предмет не привязан";
    }else{
        echo $zhk['name'];
    }
    echo "</td>
    <td>Insert to Database</td>
    <td>
<ul style='list-style: none; padding-left: 10px'>";
	$query = "class_id = ".$id;
    $students = get_query($query, 'relation_cs', $connection);
	if ($students->num_rows > 1) {
    	while ($row_students = $students->fetch_assoc()) {
        $query_ins = "id = ".$row_students['student_id'];
        $single = get_query($query_ins, 'student', $connection);
        $row_student = $single->fetch_assoc();
        echo "<li><a href='admin_studens.php?name=".$row_student['firstname']." ".$row_student['lastname']."'>".$row_student['firstname']." ".$row_student['lastname']."</a></li>";
    }
    }else{
    	echo "Ученики не привязаны";
   }
echo " </ul>
</td>
    <td>
        <button style='width: 25px; height: 25px' data-toggle='modal' data-target='#squarespaceModal".$shady."' type='button' class='btn btn-success btn-xs btn-update'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
        <button style='width: 25px; height: 25px' type='button' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
    </td>
                                              
    <div class='modal fade' id='squarespaceModal".$shady."' shady='".$shady."' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
                            <h3 class='modal-title' id='lineModalLabel'>Введите новые значения</h3>
                </div>
                    <form id='changeForm".$shady."' enctype='multipart/form-data'>
                        <div class='modal-body'>
                            
                                    <hr>
                                    <div class='row'>
                                        
                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Преподаватели</label>
                                                <div style='max-height: 105px; overflow-y:scroll'>";
if ($teacher == -1) {
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
        if ($ross['id'] == $teacher) {
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
echo "                                          </div>
                                            </div>
                                        </div>
                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Преподаватели</label>
                                                <div style='max-height: 105px; overflow-y:scroll'>";
if ($subect == -1) {
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
            if ($ross['id'] == $subject) {
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
 echo "                                          </div>
                                            </div>
                                        </div>
                                        </div>

                                        </div>
                                            <div class='modal-footer'>
                                            <div class='btn-group btn-group-justified' role='group' aria-label='group button'>
                                                <div class='btn-group' role='group'>
                                                <button type='button' id='closeNew' class='btn btn-default closer' data-dismiss='modal'  role='button'>Close</button>
                                                </div>
                                                <div class='btn-group' role='group'>
                                                <button type='button' id='saveNew".$shady."' shady='".$shady."' data-dismiss='modal' class='btn btn-default btn-hover-green saver_teacher' data-action='save' role='button'>Save</button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                            </div>";
}else{
    exit("ERROR");
}

$connection->close();
?>