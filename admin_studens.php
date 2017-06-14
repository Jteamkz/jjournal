<?php 
session_start();
$db_name = $_SESSION['studycenter'];
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/db/get_query.php';

	$connection->set_charset("utf8");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Студенты</title>

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
                                <th>Ф.И.О</th>
                                <th data-priority="1">Номер телефона</th>
                                <th data-priority="1">Номер родителей</th>
                                <th data-priority="1">Группы</th>
                                <th data-priority="1">День Оплаты</th>
                                <th data-priority="1">ИИН</th>
                                <th data-priority="1">День Рождения</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$result = getAllData('student', $connection);

                        		if ($result->num_rows > 0) {
                        			while ($row = $result->fetch_assoc()) { ?>
                        			<tr>
                        				<th><?php echo $row['lastname']." ".$row['firstname']; ?></th>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['phone_parent']; ?></td>
                                        <td>

                                        <?php 
                                            $data = array();
                                            $q = "student_id = ".$row['id'];
                                            $result_groups = get_query($q, 'relation_cs', $connection);
                                            if($result_groups->num_rows > 0){

                                                $order = 0;
                                                while ($row_cs = $result_groups->fetch_assoc()) {
                                                    $qo = "id = ".$row_cs['class_id'];
                                                    $result_group = get_query($qo, 'class', $connection);
                                                    while ($row_group = $result_group->fetch_assoc()) {
                                                        $data[$order] = $row_group['name_group'];
                                                    }
                                                    $order++;
                                                }
                                                for ($i=0; $i < $order; $i++) {
                                                    if($i == $order-1){
                                                        echo "<a href =''>".$data[$i]."</a>";
                                                    }else{
                                                        echo "<a href='' >".$data[$i]."</a>, ";
                                                    }                                                    
                                                }
                                            }else{
                                                echo 'Группы не привязаны';
                                            }
                                        ?>
                                            
                                        </td>
                                        <td><?php echo $row['payday']; ?></td>
                                        <td><?php echo $row['iin']; ?></td>
                                        <td>Insert to database</td>
                                    <tr>
                        	<?php	}
                        		}else{
                        			exit('No teachers in database');
                        		}
                        	?>
                                                        
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

</body>
</html>