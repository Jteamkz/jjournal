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
                        <h2>Материалы <?php echo $_GET['name_group']; ?></h2>
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
                                <th>Файлы</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $result = get_query('group_id = '.$_GET['id'],'materials', $connection);

                                if ($result->num_rows > 0) {
                                    $shady = 0;
                                    while ($row = $result->fetch_assoc()) { 
                                        $shady++;
                                    ?>
                                    
                                        <tr id="tr<?php echo $shady; ?>">
                                            <td><a href="<?php echo $row['link']; ?>" download> <i class="glyphicon glyphicon-save-file"> </i> <?php echo $row['name']; ?></a></td>
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
	<script type="text/javascript">
	$(document).ready(function(){
		$("#addMaterial").click(function(){
		
				var file_data = $('#file').prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data);
				var group_id = $('#group_id').val();
				var name = $('#name').val();
				
				$.ajax({
					url: 'add/materialAdd.php?group_id='+group_id+'&name='+name,
					type: 'POST',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					success: function(data){
						sessionStorage.setItem("reloading", "true");
						location.reload();
					}
				})
			
		});
	});
	function notifyBarss() {
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
			notifyBarss();
		}
	}
	</script>
</body>
</html>