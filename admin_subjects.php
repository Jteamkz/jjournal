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
    <?php include "php/headers/admin.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Список обучающих предметов</h2>
                    </div>
                    <div>
                        <p>Искать</p>
                        <input type="text" class="search form-control" placeholder="Введите что вы ищете" value="<?php 
                            if (isset($_GET['name'])) {
                                echo $_GET['name'];
                            }
                        ?>">
                        <span class="counter pull-right"></span>

                    </div>
                    <hr>
                    <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped results">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th data-priority="1">Группы</th>
                                <th data-priority="1">Учетеля</th>
                                <th></th>
                            </tr>
                            <tr class="warning no-result">
                              <td colspan="7"><i class="fa fa-warning"></i> Ничего не найдено</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
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