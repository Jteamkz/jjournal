<?php 
                                $query_t = "iin = ".$personal['iin'];
                                $data = get_query($query_t, "teacher", $connection);
                                $teacher_d = $data->fetch_assoc();

                                $fathername_t = $teacher_d['fathername'];
                                $id_t = $teacher_d['id'];
                                $query_c = "teacher_id = ".$id_t;
                                //echo $query_c;
                                $data_groups = get_query($query_c, "class", $connection);
                                $students_b = array();
                                $order = 0;
                                $students_i = array();
                                while ($data_group = $data_groups->fetch_assoc()) {
                                    $id_g = $data_group['id'];
                                    $query_ccs = "class_id = ".$id_g;
                                    $relation_cs = get_query($query_ccs, "relation_cs", $connection);
                                    while ($relation_cs_s = $relation_cs->fetch_assoc()) {
                                        $student_id = $relation_cs_s['student_id'];
                                        $students_i[$order] = $student_id;
                                        $query_s = "id = ".$student_id;
                                        $student_d = get_query($query_s, "student", $connection);
                                        $single_student_d = $student_d->fetch_assoc();
                                        $students_b[$order] = $single_student_d['birthday'];
                                        $order++;
                                    }
                                } 
                                //echo "<br>";  
                                //print_r($students_b);
                                $currentDay = date("d");
                                $currentMonth = date("m");
                                //echo "<br>";

                                for ($i=0; $i < sizeof($students_b); $i++) {
                                         
                                    for ($j=0; $j < sizeof($students_b); $j++) { 
                                        
                                        $dayFirst = substr($students_b[$i], 0, 2);
                                        $daySecond = substr($students_b[$j], 0, 2);

                                        $monthFirst = substr($students_b[$i], 3, 5);
                                        $monthSecond = substr($students_b[$j], 3, 5);
                                        if($monthFirst < $monthSecond){
                                            $temp_id = $students_i[$i];
                                            $students_i[$i] = $students_i[$j];
                                            $students_i[$j] = $temp_id;

                                            $temp = $students_b[$i];
                                            $students_b[$i] = $students_b[$j];
                                            $students_b[$j] = $temp;
                                            
                                        }else if($monthFirst == $monthSecond){
                                            if($dayFirst < $daySecond){
                                            
                                                $temp_id = $students_i[$i];
                                                $students_i[$i] = $students_i[$j];
                                                $students_i[$j] = $temp_id;

                                                $temp = $students_b[$i];
                                                $students_b[$i] = $students_b[$j];
                                                $students_b[$j] = $temp;
                                            }
                                        }
                                        
                                    }
                                }
                                //print_r($students_b);
                                $breakPoint = 0;
                                for ($i=0; $i < sizeof($students_b); $i++) { 
                                    $dayFirst = substr($students_b[$i], 0, 2);
                                    $monthFirst = substr($students_b[$i], 3, -3);
                                    if($monthFirst > $currentMonth){
                                        break;
                                    }else if($monthFirst == $currentMonth){
                                        if($dayFirst >= $currentDay){
                                            break;
                                        }else{
                                            $breakPoint++;
                                        }
                                    }else{
                                        $breakPoint++;
                                    }
                                }
                                //echo($breakPoint);
                                $firstPart = array();
                                $firstPart_id = array();
                                $secondPart = array();
                                $secondPart_id = array();
                                //echo $breakPoint."\n";
                                for($i = 0; $i < $breakPoint; $i++){
                                    $firstPart[$i] = $students_b[$i];
                                    $firstPart_id[$i] = $students_i[$i];
                                }
                                for($i = $breakPoint; $i < sizeof($students_b); $i++){
                                    $secondPart[$i] = $students_b[$i];
                                    $secondPart_id[$i] = $students_i[$i];
                                }
                                //echo "<br>-";
                                $all = array_merge($secondPart, $firstPart);
                                $all_id = array_merge($firstPart_id, $secondPart_id);
                                //print_r($all);
                                //echo "<br>";
                                //print_r($all_id);
                            ?>