<?php 

include 'php/session.php';
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';

	$connection->set_charset("utf8");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Предметы</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thousand - Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/rwd-table.css">

</head>
<body>
	<section id="demo">
            <div class="container">
                <div class="page-header">
                    <h2>Demo</h2>
                </div>

                <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th data-priority="1">Группы</th>
                                <th data-priority="1">Учетеля</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$result = getAllData('subjects', $connection);

                        		if ($result->num_rows > 0) {
                        			while ($row = $result->fetch_assoc()) { ?>
                        			
                        				<tr>
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
			                                
			                            </tr>

                        	<?php	}
                        		}else{
                        			exit('No teachers in database');
                        		}
                        	?>
                            <!-- Repeat -->
                            
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
            </div> <!-- end container -->
        </section>



    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/rwd-table.js"></script>
    <script type="text/javascript">
    
    </script>
</body>
</html>