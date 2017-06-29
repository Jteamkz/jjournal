<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'db/connect_db.php';
include 'db/get_all_data.php';
$connection->set_charset("utf8");
$shady = $_GET['shady'];
$izno = $_GET['izno'];
$password = $_POST['password'];
$firstname = $_POST['name'];
$lastname = $_POST['surname'];
$fathername = $_POST['fathername'];
$phone = $_POST['tele'];
$iin = $_POST['iin'];
$phone_parent = $_POST['tele_rod'];
$payday = $_POST['payday'];
$birthday = $_POST['birthday'];
$groups = $_POST['checkboxname'];



$update_query = "UPDATE student SET firstname = '$firstname', lastname = '$lastname', fathername = '$fathername', phone = '$phone', iin = '$iin', phone_parent = '$phone_parent', payday = '$payday', birthday = '$birthday' WHERE iin = '$izno'";

if ($connection->query($update_query) === TRUE) {
echo " <th>".$lastname." ".$firstname." ".$fathername."</td>
    <td>".$phone."</td>
    <td>".$phone_parent."</td>
    <td>\n";
for ($i=0; $i < sizeof($groups); $i++) {
	if ($i == sizeof($groups)-1) {
		echo "<a href ='admin_groups.php?name=".$groups[$i]."'>".$groups[$i]."</a>";
	 	
	}else{
		echo "<a href='admin_groups.php?name=".$groups[$i]."' >".$groups[$i]."</a>, ";
	}
}
echo "</td>
	<td>".$payday."</td>
    <td>".$iin."</td>
    <td>".$password."</td>
    <td>".$birthday."</td>
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
                        	<div class='row'>
		                        <div class='col-lg-4'>
				                    <div class='form-group'>
							            <label for='InputFirstname'>Фамилия</label>
                                        <input type='text' name='surname' class='form-control' id='InputFirstname' placeholder='Введите фамилию' value='".$firstname."'>
                                    </div>
                                </div>
                                <div class='col-lg-4'> 
			                    <div class='form-group'>
				                    <label for='InputName'>Имя</label>
				                    <input name='name' type='text' class='form-control' id='InputName' placeholder='Введите Имя' value='".$lastname."'>
								</div>
                                </div>
                                <div class='col-lg-4'> 
                                	<div class='form-group'>
                                	<label for='InputFathername'>Отчество</label>
                                    <input name='fathername' type='text' class='form-control' id='InputFathername' placeholder='Отчество' value='".$fathername."'>
                                </div>
                               	</div>
                                </div>
									<hr>
                                <div class='row'>
                                	<div class='col-lg-4'> 
                                	<div class='form-group'>
                                    	<label for='InputTele'>Номер телефона</label>
                                        	<input name='tele' type='text' class='form-control' id='InputTele' placeholder='Отчество' value='".$phone."'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                    	<div class='form-group'>
                                        	<label for='InputTeleP'>Номер родителей</label>
                                            <input name='tele_rod' type='text' class='form-control' id='InputTeleP' placeholder='Отчество' value='".$phone_parent."'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                        	<label for='IIIN'>ИИН</label>
                                           	<input name='iin' type='text' class='form-control' id='IIIN' placeholder='Отчество' value='".$iin."'>
                                        </div>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
		                                <div class='col-lg-6'>
                                            <div class='form-group'>
                                            <label for='dayb'>День рождения</label>
                                            <input name='birthday' type='text' class='form-control' id='dayb' placeholder='День рождения' value='".$birthday."'>
                                        </div>
                                    </div>
                                    <div class='col-lg-6'>
                                    	<div class='form-group'>
                                        	<label for='dayp'>День оплаты</label>
                                            <input type='text' class='form-control' name='payday' id='dayp' placeholder='День оплаты' value='".$payday."'>
                                        </div>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                    	<div class='col-lg-6'>
                                        	<div class='form-group'>
                                            	<label for='pass'>Пароль для входа в систему</label>
                                                <input name='password' type='text' class='form-control' id='pass' placeholder='Пароль для входа в систему' value='".$password."'>
                                          	</div>
                                        </div>
                                        <div class='col-lg-6'>
                                        	<div class='form-group'>
                                            	<label>Группы</label>
                                                <div style='max-height: 105px; overflow-y:scroll'>";
                                                	if (sizeof($groups) > 0) {
	$result_all_group = getAllData('class', $connection);
	if ($result_all_group->num_rows > 0) {
    while ($ross = $result_all_group->fetch_assoc()) {
    $t = false;
        for($y=0; $y < sizeof($groups); $y++){
            if ($ross['name_group'] == $groups[$y]) {
                echo "<label>\n";
                echo "<input type='checkbox' name='checkboxname[]' value='".$ross['name_group']."' checked> ".$ross['name_group']."\n";
                echo "</label><br>";
                $t = true;
            }
        } 
    
    if ($t != true) {
        echo "<label>\n";
        echo "<input type='checkbox' value='".$ross['name_group']."' name='checkboxname[]'> ".$ross['name_group']."\n";
        echo "</label><br>";
    }
    }
    }else{
        echo "Группы не добавлены";
    }
}
 echo "                                               </div>
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
                                                <button type='button' id='saveNew".$shady."' shady='".$shady."' data-dismiss='modal' class='btn btn-default btn-hover-green saver' data-action='save' role='button'>Save</button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                            </div>";
} else {
    echo "Error updating record: " . $connection->error;
}

$connection->close();
?>