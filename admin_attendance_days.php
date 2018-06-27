<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include 'php/SQLconnect.php';

    $connection->set_charset("utf8");
$just = getAllData('about', $connection);
$about = $just->fetch_assoc();
unset($just);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Посещаемость</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
    <?php if(isset($_SESSION['isTeacher'])) include "php/headers/teacher.php"; else include "php/headers/admin.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список уроков в группе <?php echo $_GET['name_group']; ?> <button data-toggle="modal" data-target="#myModal" class="btn btn-success">Добавить урок</button></h2>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте уроки</h4>
      </div>
      <div class="modal-body">
	<form id="lessonForm" method='post'>
		<input type="hidden" name="group_id" value="<?php echo $_GET['id']; ?>">
		<input type='text' class="form-control" placeholder='Название или дата урока' name='name' required>
    </form>
      </div>
      <div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Закрыть</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Удалить</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="addLesson" class="btn btn-default btn-hover-green" data-action="save" role="button">Добавить</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>						
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Название или дата урока</th>
								<th></th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$group_id = $_GET['id'];
								$sql = "SELECT * FROM lessons WHERE group_id = $group_id";
								$result = $con->query($sql);
					
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
                            ?>
							<tr>
								<td><?php echo $row['name']; ?></td>
								<?php 
									if($row['isset'] == "not"){
										?>
										<td><a href="admin_attendance_days_setstudents?group_id=<?php echo $group_id; ?>&lesson_id=<?php echo $row['id']; ?>&name_group=<?php echo $_GET['name_group']; ?>">Поставить посещаемость</a></td>
										<?php
									}else{
									?>
										<td><a href="admin_attendance_days_lookstudents?lesson_id=<?php echo $row['id']; ?>">Просмотреть</a></td>
									<?php } ?>
							</tr>
                            <?php
									}
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
	<script src="js/delete.js"></script>
    <script type="text/javascript" src="js/spinn.js"></script>
    <script type="text/javascript" src="js/finder.js"></script>
    <script type="text/javascript" src="js/rwd-table.js"></script>
    <script type="text/javascript" src="js/update.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#addLesson").click(function(){
		
				
				var $form = $("#lessonForm");

				var serializedData = $form.serialize();
				
				$.ajax({
					url: 'add/lessonAdd.php',
					type: 'POST',
					data: serializedData,
					success: function(data){
						sessionStorage.setItem("reloading", "true");
						location.reload();
					}
				})
			
		});
	});
	function notifyBar() {
	  if(! $('.alert-box').length) {
		$('<div class="alert-box success" style="z-index:9999999999;">Добавлено</div>').prependTo('body').delay(800).fadeOut(200, function() {
				$('.alert-box').remove();
				});
	  };
	};
	window.onload = function() {
		var reloading = sessionStorage.getItem("reloading");
		if (reloading) {
			sessionStorage.removeItem("reloading");
			notifyBar();
		}
	}
	</script>
</body>
</html>