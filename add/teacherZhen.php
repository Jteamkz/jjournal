<?php
				session_start();
				$db_name = $_SESSION['studycenter'];

				include '../php/SQLconnect.php';
				include '../php/connectOS.php';
				
				$id_s = $_GET['id_s'];
				
                $sql = "SELECT * FROM relation_ts WHERE id_s = $id_s";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
						$id_t = $row['id_t'];
						$sql1 = "SELECT * FROM teacher WHERE id = $id_t";
						$result1 = $con->query($sql1);

						if ($result1->num_rows > 0) {
							// output data of each row
							while($row1 = $result1->fetch_assoc()) {
								echo "<option value='".$row1['id']."'' title='teacher''>".$row1['firstname']." ".$row1['lastname']." ".$row1['fathername']."</option>";
							}
						}
                    }
                }
            ?>