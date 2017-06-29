    echo " <th>".$firstname." ".$lastname." ".$fathername."</td>
    <td>".$phone."</td>
    <td>".$phone_parent."</td>
    <td>
    	Belyberda
    </td>
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
                                        <input type='text' name='surname' class='form-control' id='InputFirstname' placeholder='Введите фамилию' value='qwer'>
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
                                        	<input name='tele' type='text' class='form-control' id='InputTele' placeholder='Отчество' value='".$tele."'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                    	<div class='form-group'>
                                        	<label for='InputTeleP'>Номер родителей</label>
                                            <input name='tele_rod' type='text' class='form-control' id='InputTeleP' placeholder='Отчество' value='".$tele_rod."'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                        	<label for='IIIN'>ИИН</label>
                                           	<input name='iin' type='text' class='form-control' id='IIIN' placeholder='Отчество' value='".$IIIN."'>
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
                                                <div style='max-height: 105px; overflow-y:scroll'>
                                                
                                                </div>
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