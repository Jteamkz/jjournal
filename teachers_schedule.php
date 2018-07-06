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
include 'php/SQLconnect.php';
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

$gruppa = array();
$kabinet = array();
$bastalus = array();
$bastalum = array();
$ayaktalus = array();
$ayaktalum = array();
$dni = array();
$tuster = array();
//$starttimes = array();
//$endtimes = array();
$durations = array();

$kabkuns = array("mr", "tur", "wr", "thr", "fr", "sar", "sur");
$colors = array("yellowgreen","yellow","violet","thistle","teal","sienna","powderblue","palevioletred","navy","indigo","goldonrod","dodgerblue","deeppink","darkslateblue","yellowgreen","yellow","violet","thistle","teal","sienna","powderblue","palevioletred","navy","indigo","goldonrod","dodgerblue","deeppink","darkslateblue","yellowgreen","yellow","violet","thistle","teal","sienna","powderblue","palevioletred","navy","indigo","goldonrod","dodgerblue","deeppink","darkslateblue");
$kunder = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
$dender = array("понедельник", "вторник", "среда", "четверг", "пятница", "суббота", "воскресенье");

?>
<!DOCTYPE html>
<html lang="en">

<?php include "php/head.php"; ?>
<body>

    <div id="wrapper">
		<?php include "php/headers/admin.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid schedule" id="myAppDobro">
                <?php
					$teacher_id = $_GET['id'];
					$sql = "SELECT schedule, name_group FROM class WHERE teacher_id = $teacher_id";
					$result = $con->query($sql);
					$minsagat = 25;
					$minminut = 61;
					$maxsagat = -1;
					$maxminut = -1;
					$gaga = 0;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$schedule_id = $row['schedule'];
							$name_group = $row['name_group'];
							$sql1 = "SELECT * FROM schedule WHERE id = $schedule_id";
							$result1 = $con->query($sql1);

							if ($result1->num_rows > 0) {
								while($row1 = $result1->fetch_assoc()) {
									for($p = 0; $p < 7; $p++){
										$kabkun = $kabkuns[$p];
										$kun = $kunder[$p];
										if(!$row1[$kabkun] == ""){
											array_push($gruppa, $name_group);
											array_push($kabinet, $row1[$kabkun]);
											array_push($bastalus, substr($row1[$kun], 0, 2));
											array_push($bastalum, substr($row1[$kun], 3, 2));
											array_push($ayaktalus, substr($row1[$kun], 6, 2));
											array_push($ayaktalum, substr($row1[$kun], 9, 2));
											array_push($tuster, $colors[$gaga]);
											array_push($dni, $kun);
											//array_push($starttimes, substr($row1[$kun], 0, 2).":".substr($row1[$kun], 3, 2).":00");
											//array_push($endtimes, substr($row1[$kun], 6, 2).":".substr($row1[$kun], 9, 2).":00");
											$startTime = new DateTime(substr($row1[$kun], 0, 2).":".substr($row1[$kun], 3, 2).":00");
											$endTime = new DateTime(substr($row1[$kun], 6, 2).":".substr($row1[$kun], 9, 2).":00");
											$duration = $startTime->diff($endTime);
											array_push($durations, 60*substr($duration->format("%H:%I:%S"), 0, 2)+substr($duration->format("%H:%I:%S"), 3, 2));
											if($minsagat > substr($row1[$kun], 0, 2)){
												$minsagat = substr($row1[$kun], 0, 2);
											}
											if($maxsagat < substr($row1[$kun], 6, 2)){
												$maxsagat = substr($row1[$kun], 6, 2);
											}
										}
									}
									$gaga++;
								}
							}
						}
					}
				?>
				<br>
				<h3><?php echo $_GET['name']; ?></h3>
				<br>
				<table class="table">
					<tr style="text-align:center; border:black solid 1px;">
					<td style="border:black solid 1px;"></td>
					<?php
						$lo = 0;
						foreach($dender as $kun){
					?>
						<td id="denok<?php echo $lo; ?>" style="width:144px; border:solid 1px black;"><?php echo $kun; ?></td>
					<?php
						$lo++;
						}
						for($i = $minsagat; $i < $maxsagat + 1; $i++){
					?>
						<tr style="border:black solid 1px;">
							<td style="border:black solid 1px;height:100px; width:50px;text-align:center;"><?php echo $i; ?></td>
								<?php
								$k = 0;
								foreach($kunder as $kun){
									$numba = 0;
										if(in_array($kun, $dni)){
											for($j=0; $j<sizeof($dni); $j++){
												if($dni[$j] == $kun && $i == $bastalus[$j]){
													$numba = $j;
													break;
												}
											}
											if($i == $bastalus[$numba]){
									?>
										<td style="border:black solid 1px;height:100px; padding:0"><div class="sabak<?php echo $k; ?>" style="padding-top:10px;vertical-align:middle;text-align:center;position:absolute;margin-top:<?php echo 100*($bastalum[$numba]/60); ?>px;height:<?php echo 100*($durations[$numba]/60); ?>px;background-color:<?php echo $tuster[$numba]; ?>; width:140px;"><?php echo $gruppa[$numba]."<br>".$bastalus[$numba].":".$bastalum[$numba]." - ".$ayaktalus[$numba].":".$ayaktalum[$numba]."<br>".$kabinet[$numba]; ?></div></td>
									<?php
											array_splice($gruppa, $numba, 1);
											array_splice($kabinet, $numba, 1);
											array_splice($bastalus, $numba, 1);
											array_splice($bastalum, $numba, 1);
											array_splice($ayaktalus, $numba, 1);
											array_splice($ayaktalum, $numba, 1);
											array_splice($dni, $numba, 1);
											array_splice($durations, $numba, 1);
											array_splice($tuster, $numba, 1);
											}else echo "<td style='border:black solid 1px;'></td>";
										}else echo "<td style='border:black solid 1px;'></td>";
									$k++;
								}
								?>
						</tr>
					<?php
						}
					?>
					</tr>
				</table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/teacher_save.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script>
	$( document ).ready(function() {
		for(var i = 0; i < 7; i++){
			var width = $("#denok"+i).css("width");
			width = width.slice(0, -2);
			$(".sabak"+i).width(width - 1);
		}
	});
	</script>
</body>

</html>
