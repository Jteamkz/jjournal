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
                                <th>Ф.И.О</th>
                                <th data-priority="1">Номер телефона</th>
                                <th data-priority="1">Дата рождения</th>
                                <th data-priority="1">Уроки</th>
                                <th data-priority="1">Группы</th>
                                <th data-priority="1">Зарплата</th>
                                <th data-priority="1">ИИН</th>
                                <th data-priority="1">Lorem</th>
                                <th data-priority="1">Ipsum</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$result = getAllData('teacher', $connection);

                        		if ($result->num_rows > 0) {
                        			while ($row = $result->fetch_assoc()) { ?>
                        			
                        				<tr>
			                                <th><?php echo $row['lastname']." ".$row['firstname']; ?></th>
			                                <td><?php echo $row['telephone']; ?></td>
			                                <td><?php echo "Enter to database"; ?></td>
			                                <td><?php 
			                                	$query = "id_t = ".$row['id'];
			                                	$result_ts = get_query($query, 'relation_ts', $connection);
			                                	if ($result_ts->num_rows > 0) {
			                                		$temp = 0;
			                                		while ($row_ts = $result_ts->fetch_assoc()) {
			                                			$temp++;
			                                			$query_s = "id = ".$row_ts['id_s'];
			                                			$result_sb = get_query($query_s, 'subjects', $connection);
			                                			while ($row_sb = $result_sb->fetch_assoc()) {
			                                				if ($temp < $result_ts->num_rows) {
			                                					echo "<a href=''>".$row_sb['name']."</a>, ";
			                                				}else{
			                                					echo "<a href=''>".$row_sb['name']."</a>";
			                                				}
			                                			}
			                                		}
			                                	}else{
			                                		echo "Предмет не выбран";
			                                	}
			                                ?>
			                                </td>
			                                <td>
			                                <?php 
			                                	$query_for_class = "teacher_id = ".$row['id'];
			                                	$result_cl = get_query($query_for_class, 'class', $connection);
			                                	if($result_cl->num_rows > 0){
			                                		$tempp = 0;
			                                		while ($row_cl = $result_cl->fetch_assoc()) {
			                                			$tempp++;
			                                			if ($tempp < $result_cl->num_rows) {
			                                				echo "<a href=''>".$row_cl['name_group']."</a>, ";
			                                			}else{
			                                				echo "<a href=''>".$row_cl['name_group']."</a>";
			                                			}
			                                		}
			                                	}else{
			                                		echo "Группа не привязана";
			                                	}
			                                ?>
			                                </td>
			                                <td>30.67</td>
			                                <td><?php echo $row['iin']; ?></td>
			                                <td colspan="2">Spanning cell</td>
			                            </tr>

                        	<?php	}
                        		}else{
                        			exit('No teachers in database');
                        		}
                        	?>
                            <tr>
                                <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                                <td>31.15</td>
                                <td>12:44PM</td>
                                <td>1.41 (4.72%)</td>
                                <td>29.74</td>
                                <td>30.67</td>
                                <td>31.14 x 6500</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr> <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr> <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr> <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr> <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr> <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
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

</body>
</html>