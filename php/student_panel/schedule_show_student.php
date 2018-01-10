<?php
include 'php/class/one_schedule.php';
$student_id = $personal['id'];

$sqls = "student_id = ".$student_id;

$data_groups = get_query($sqls, "relation_cs", $connection);

$id_schedules = array();
$order = 0;
$id_groups = array();
$name_groups = array();

while ($data_group = $data_groups->fetch_assoc()) {
    
    $id_groups[$order] = $data_group['class_id'];
    $sqls2 = "id = ".$id_groups[$order];
    $datas = get_query($sqls2, "class", $connection);
    while ($datas2 = $datas->fetch_assoc()) {
        $name_groups[$order] = $datas2['name_group'];
        $id_schedules[$order] = $datas2['schedule'];
    }
    
    $order++;
}

$order = 0;
$data_schedule = array();
//print_r($name_groups);
foreach($id_schedules as $id_schedule){
    $sql_schedule = "id = ".$id_schedule;
    
    $all_schedule = get_query($sql_schedule, "schedule", $connection);

    if ($all_schedule->num_rows > 0) {
        while($single_schedule = $all_schedule->fetch_assoc()){
            $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);
            array_push($data_schedule, $temp);
        }
    }else{
        echo "No schedule";
        //echo $connection->error;
    }
    $order++;

}

// print_r($data_schedule);
// echo "<h1>sdsd</h1>"

echo "<div class='row'>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Понедельник</p>
                            </div>
                            <div class='box-s'>";
                                $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_monday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_monday(), 0, 2).":". substr($temp_single->get_monday(), 3, 2) ." до ". substr($temp_single->get_monday(), 6, 2) .":". substr($temp_single->get_monday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_mr();
                                            echo "  </div>

                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }
                                
echo "
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Вторник</p>
                            </div>
                            <div class='box-s'>";
                                $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_tuesday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_tuesday(), 0, 2).":". substr($temp_single->get_tuesday(), 3, 2) ." до ". substr($temp_single->get_tuesday(), 6, 2) .":". substr($temp_single->get_tuesday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_tur();
                                            echo "  </div>
                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }
echo "                      </div>
                        </div>
                    </div>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Среда</p>
                            </div>
                            <div class='box-s'>";
                                $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_wednesday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_wednesday(), 0, 2).":". substr($temp_single->get_wednesday(), 3, 2) ." до ". substr($temp_single->get_wednesday(), 6, 2) .":". substr($temp_single->get_wednesday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_wr();
                                            echo "  </div>
                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }
                 echo "     </div>
                        </div>
                    </div>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Четверг</p>
                            </div>
                            <div class='box-s'>";
                                $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_thursday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_thursday(), 0, 2).":". substr($temp_single->get_thursday(), 3, 2) ." до ". substr($temp_single->get_thursday(), 6, 2) .":". substr($temp_single->get_thursday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_thr();
                                            echo "  </div>
                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }  
        echo "              </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Пятница</p>
                            </div>
                            <div class='box-s'>";
                                $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_friday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_friday(), 0, 2).":". substr($temp_single->get_friday(), 3, 2) ." до ". substr($temp_single->get_friday(), 6, 2) .":". substr($temp_single->get_friday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_fr();
                                            echo "  </div>
                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }  
                    echo   "</div>
                        </div>
                    </div>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Суббота</p>
                            </div>
                            <div class='box-s'>";
                            $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_saturday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_saturday(), 0, 2).":". substr($temp_single->get_saturday(), 3, 2) ." до ". substr($temp_single->get_saturday(), 6, 2) .":". substr($temp_single->get_saturday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_sar();
                                            echo "  </div>
                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }  
                            echo "</div>
                        </div>
                    </div>
                    <div class='col-lg-3'>
                        <div class='shadow'>
                            <div class='jjournal-panel-top'  style='text-align: center'>
                                <p class='jjournal-green'>Воскресенье</p>
                            </div>
                            <div class='box-s'>";
                                $bar = FALSE;
                                foreach($data_schedule as $temp_single){
                                    $string = str_replace(' ', '', $temp_single->get_sunday());
                                    if($string){
                                        echo "
                                            <div class='chunks-s'>
                                                <h4>"; echo $temp_single->get_group_name()." </h4>
                                                <p class='schedule-time'>"; 
                                                   echo "с ".substr($temp_single->get_sunday(), 0, 2).":". substr($temp_single->get_sunday(), 3, 2) ." до ". substr($temp_single->get_sunday(), 6, 2) .":". substr($temp_single->get_sunday(), 9) ."
                                                </p>
                                                <div class='room'>
                                                    <div class='room-s'> КАБИНЕТ </div>";
                                                    echo $temp_single->get_sur();
                                            echo "  </div>
                                            </div>
                                        ";
                                        $bar = TRUE;
                                    }
                                }
                                if(!$bar){
                                    echo "<div class='chunks-s'>
                                            <h4>Нет занятий</h4>
                                        </div>";
                                }  
                            echo "</div>
                        </div>
                    </div>
                </div>";


?>