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
    <title>Группы</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thousand - Admin Page</title>

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
		<form method="post" action="add/addAttendance.php">
			<input type="hidden" name="group_id" value="<?php echo $_GET['group_id']; ?>">
			<input type="hidden" name="lesson_id" value="<?php echo $_GET['lesson_id']; ?>">
			<input type="hidden" name="name_group" value="<?php echo $_GET['name_group']; ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Поставьте посещаемость ученикам</h2>					
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Ученик</th>
								<th>Был / Не был</th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$group_id = $_GET['group_id'];
								$sql = "SELECT * FROM relation_cs WHERE class_id = $group_id";
								$result = $con->query($sql);
					
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$student_id = $row['student_id'];
										$sql1 = "SELECT * FROM student WHERE id = $student_id";
										$result1 = $con->query($sql1);
							
										if ($result1->num_rows > 0) {
											while($row1 = $result1->fetch_assoc()) {
                            ?>
							<tr>
								<td><?php echo $row1['firstname']." ".$row1['lastname']." ".$row1['fathername']; ?></td>
								<td> Был <input type="radio" name="attendance<?php echo $row1['id']; ?>" value="yes"> / Не был <input type="radio" name="attendance<?php echo $row1['id']; ?>" value="not"> </td>
							</tr>
                            <?php
											}
										}
									}
								}
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
                <button style="float:right;" class="btn btn-success" type="submit">Поставить</button>
			</form>
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
						 location.reload();
					}
				})
			
		});
	});
	</script>
</body>
</html>