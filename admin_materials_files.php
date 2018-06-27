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
<head>
    <title>Материалы</title>

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

</head>
<body>
<div id="wrapper">
    <?php if(isset($_SESSION['isTeacher'])) include "php/headers/teacher.php"; else include "php/headers/admin.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Материалы <?php echo $_GET['name_group']; ?> <button data-toggle="modal" data-target="#myModal" class="btn btn-success">Добавить материал</button></h2>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Добавьте уроки</h4>
      </div>
      <div class="modal-body">
	<form id="materialForm" method='post' enctype="multipart/form-data">
		<input type="hidden" id="group_id" value="<?php echo $_GET['id']; ?>">
		<input type="text" class="form-control" id="name" placeholder="Название"><br>
		<input type='file' id='file' name='file' required>
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
					<button type="button" id="addMaterial" class="btn btn-default btn-hover-green" data-action="save" role="button">Добавить</button>
				</div>
			</div>
		</div>
    </div>

  </div>
</div>	
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
                                <th></th>
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
                                    
                                        <tr class="middlel" id="tr<?php echo $shady; ?>">
                                            <td><a href="<?php echo $row['link']; ?>" download> <i class="glyphicon glyphicon-save-file"> </i> <?php echo $row['name']; ?></a></td>
                                            <td>
                                                <button style="width: 25px; height: 25px" shady="<?php echo $shady; ?>" link="<?php echo $row['link']; ?>" material="<?php echo $row['id']; ?>" type="button" class="btn btn-danger btn-xs delete_material"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
		$('input:file').bind('change', function() {
			if(this.files[0].size > 20000000){
				alert("Больше 20 Мб нельзя!!!");
				$("input:file").val("");
			}
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