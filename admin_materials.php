<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';

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
    <?php if(isset($_SESSION['isTeacher'])) include "php/headers/teacher.php"; else include "php/headers/admin.php"; ?>
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
                                if(isset($_SESSION['isTeacher'])) $sql = "SELECT * FROM class WHERE teacher_id = ".$_SESSION['id']; else $sql = "SELECT * FROM class";
								$result = $connection->query($sql);
								
                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) { 
                                        $shady++;
                                    ?>
                                    <tr class="middlel" id="tr<?php echo $shady; ?>">
                                    <th><?php echo "<a href='admin_materials_files?id=".$row['id']."&name_group=".$row['name_group']."'>"."<text style='font-weight:normal;'>Материалы </text> ".$row['name_group']."</a>"; ?></th>
                                    </tr>
                            <?php             
                                    }
                                }else{

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