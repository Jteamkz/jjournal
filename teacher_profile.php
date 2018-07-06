<?php
	session_start();
	$db_name = $_SESSION['studycenter'];
	if (isset($_SESSION['tele'])) {
    $iin_b = FALSE;
    $tele = $_SESSION['tele'];
	}
	else if(isset($_SESSION['iin'])){
			$iin_b = TRUE;
			$iin = $_SESSION['iin'];
	}
	include 'php/db/connect_db.php';
	include 'php/db/get_all_data.php';
	include 'php/db/get.php';
	include 'php/db/get_query.php';
	include 'php/db/get_personal.php';
	include 'php/SQLconnect.php';
	include 'php/connectOS.php';

	$id_okushy = $_SESSION['id'];
//$_SESSION['iin'] = $personal['iin'];
$connection->set_charset("utf8");
$result = getAllData('about', $connection);
$about = $result->fetch_assoc();
	
	?>
<!DOCTYPE html>
<html lang="en">
<?php include "php/head.php"; ?>
<body>
<?php
	$sql = "SELECT * FROM teacher WHERE id = $id_okushy";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$iin_teacher = $row['iin'];
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
		}
?>
    <div id="wrapper">
       <?php include "php/headers/teacher.php"; ?>

        <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Профиль учителя <?= $firstname ?> <?= $lastname ?></h2>
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Пароль</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="ok">
								<tr>
                                            <td>
												<?php
													$sql9 = "SELECT * FROM users";
													$result9 = $cuni->query($sql9);

													if ($result9->num_rows > 0) {
														// output data of each row
														while($row9 = $result9->fetch_assoc()) {
															if($iin_teacher == $row9['iin']){
																for($i = 0; $i<strlen($row9['password']); $i++){
																	echo "*";
																}
															}
														}
													}
												?>
											</td>
                                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Изменить</button></td>
								</tr>
							<?php
								}
								//$conn->close(); 
							?>
                        </tbody>
                    </table>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title">Изменить пароль</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body" style="padding-right:150px; padding-left:150px;">
							<form method="post" id="changePass">
								<input type="password" class="form-control" id="oldpass" placeholder="Старый пароль" name="oldpass"><br>
								<input type="password" class="form-control" id="newpass" placeholder="Новый пароль" name="newpass"><br>
								<input type="password" class="form-control" id="repnewpass" placeholder="Повторите новый пароль" name="repnewpass">
								<input type="hidden" name="table" value="teacher">
							</form>
						  </div>
						  <div class="modal-footer" style="padding:10px;">
							<button type="button" class="btn btn-success update_pass">Изменить</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
						  </div>
						</div>
					  </div>
					</div>
                </div>
                </div>
            </div>
                
                <br>
                <br>


            </div> <!-- end container -->
    </div>
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/teacher_save.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script src="js/update.js"></script>
	<script>
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})
	</script>

</body>

</html>