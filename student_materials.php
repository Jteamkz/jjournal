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
<html>
<?php include "php/head.php"; ?>
<body>
<div id="wrapper">
    <?php include "php/headers/student.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список групп Материалы</h2>
                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Название группы</th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$sql5 = "SELECT * FROM relation_cs WHERE student_id = ".$_SESSION['id'];
								$result5 = $con->query($sql5);
								
                                if ($result5->num_rows > 0) {
                                    while ($row5 = $result5->fetch_assoc()) { 
										$sql = "SELECT * FROM class WHERE id = ".$row5['class_id'];
										$result = $connection->query($sql);
										
										if ($result->num_rows > 0) {
											$shady = 0;
											while ($row = $result->fetch_assoc()) { 
												$shady++;
                                    ?>
                                    <tr class="middlel" id="tr<?php echo $shady; ?>">
                                    <th><?php echo "<a href='student_materials_files?id=".$row['id']."&name_group=".$row['name_group']."'>"."<text style='font-weight:normal;'>Материалы </text> ".$row['name_group']."</a>"; ?></th>
                                    </tr>
                            <?php
											}
										}
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

</body>
</html>