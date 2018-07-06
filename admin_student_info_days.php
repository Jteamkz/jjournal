<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';
include 'php/connectOS.php';
include 'php/SQLconnect.php';

$id_okushy = $_GET['id'];
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
	<?php include "php/headers/admin.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Посещаемость студента <?php echo $_GET['name']; ?> в группе <?php echo $_GET['name_group']; ?></h2>					
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Название или дата</th>
								<th>Был / Не был</th>
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
										$lesson_id = $row['id'];
										$sql1 = "SELECT * FROM attendance WHERE lesson_id = $lesson_id AND student_id = ".$_GET['student_id'];
										$result1 = $con->query($sql1);
							
										if ($result1->num_rows > 0) {
											while($row1 = $result1->fetch_assoc()) {
                            ?>
							<tr>
								<td><?php echo $row['name']; ?></td>
								<td><?php if($row1['bool']== "yes") echo "Был"; else echo "Не был"; ?></td>
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