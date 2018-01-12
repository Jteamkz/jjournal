<?php
include 'php/class/one_schedule.php';
$teacher_id = $personal['id'];

$sql = "teacher_id = ".$teacher_id;

$data_groups = get_query($sql, "class", $connection);
$id_schedules = array();
$order = 0;
$id_groups = array();
$name_groups = array();
while ($data_group = $data_groups->fetch_assoc()) {
    
    $id_groups[$order] = $data_group['id'];
    $name_groups[$order] = $data_group['name_group'];
    $id_schedules[$order] = $data_group['schedule'];
    $order++;
}

$order = 0;
$data_schedule = array();

$currentDay = date("D");

foreach($id_schedules as $id_schedule){

    $sql_schedule = "id = ".$id_schedule;
    
    $all_schedule = get_query($sql_schedule, "schedule", $connection);

    if ($all_schedule->num_rows > 0) {
        while($single_schedule = $all_schedule->fetch_assoc()){
            switch ($currentDay) {
                case "Mon":
                    $string = str_replace(' ', '', $single_schedule['monday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
                case "Tue":
                    $string = str_replace(' ', '', $single_schedule['tuesday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
                case "Wed":
                    $string = str_replace(' ', '',$single_schedule['wednesday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
                case "Thu":
                    $string = str_replace(' ', '', $single_schedule['thursday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
                case "Fri":
                    $string = str_replace(' ', '', $single_schedule['friday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
                case "Sat":
                    $string = str_replace(' ', '', $single_schedule['saturday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
                case "Sun":
                    $string = str_replace(' ', '', $single_schedule['sunday']);
                    if ($string) {
                        $temp = new one_schedule($id_schedule, $single_schedule['monday'], $single_schedule['tuesday'], $single_schedule['wednesday'], $single_schedule['thursday'], $single_schedule['friday'], $single_schedule['saturday'], $single_schedule['sunday'], $single_schedule['mr'], $single_schedule['tur'], $single_schedule['wr'], $single_schedule['thr'], $single_schedule['fr'], $single_schedule['sar'], $single_schedule['sur'], $id_groups[$order], $name_groups[$order]);

                        array_push($data_schedule, $temp);
                    }
                    break;
            }
        }
    }else{
        echo "No schedule";
    }
    $order++;

}






?>