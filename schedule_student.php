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

$_SESSION['id'] = $personal['id'];
$_SESSION['iin'] = $personal['iin'];
$connection->set_charset("utf8");

$result = getAllData('about', $connection);
$about = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<?php include "php/head.php"; ?>
<body>

    <div id="wrapper">
        <?php include "php/headers/student.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid schedule" id="myAppDobro">
                <?php include "php/teacher_panel/schedule_show.php" ?>
            </div>
            <!-- /.container-fluid -->

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

</body>

</html>
