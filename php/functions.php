<?php
	function getAge($date, $birthday)
	{
		// 01.01.2019
		$age = substr($date, 6, 4) - substr($birthday, 6, 4);
		if(substr($date, 3, 2) < substr($birthday, 3, 2)){
			$age--;
		}else if(substr($date, 4, 2) == substr($birthday, 4, 2)){
			if(substr($date, 0, 2) < substr($birthday, 0, 2)){
				$age--;
			}else if(substr($date, 0, 2) == substr($birthday, 0, 2)){
				return "День рождения ".$age;
			}
		}
		return $age;
	}
	function getGroupsOfStudent($row, $connection)
	{
		$data = getDataForStudentGroups($row, $connection);

		if(sizeof($data) != 0){
			for ($i=0; $i < sizeof($data); $i++) {
				if($i == sizeof($data) - 1){
					echo "<a href ='admin_groups?name=".$data[$i]."'>".$data[$i]."</a>";
				}else{
					echo "<a href='admin_groups?name=".$data[$i]."' >".$data[$i]."</a>, ";
				}
			}
        }else{
            echo 'Группы не привязаны';
        }
	}
	function getPassOfStudent($row, $cuni)
	{
		$sql9 = "SELECT * FROM users";
		$result9 = $cuni->query($sql9);

		if ($result9->num_rows > 0) {
			// output data of each row
			while($row9 = $result9->fetch_assoc()) {
				if($row['iin'] == $row9['iin']){
					echo $row9['password'];
					break;
				}
			}
		}
	}
	function getOrderForStudentGroups($row, $connection)
	{
		$q = "student_id = ".$row['id'];
        $result_groups = get_query($q, 'relation_cs', $connection);

		return $result_groups->num_rows;
	}
	function getDataForStudentGroups($row, $connection)
	{
		$q = "student_id = ".$row['id'];
        $result_groups = get_query($q, 'relation_cs', $connection);

        if($result_groups->num_rows > 0){

            // print_r($result_groups);
            while ($row_cs = $result_groups->fetch_assoc()) {
                $qo = "id = ".$row_cs['class_id'];
                $result_group = get_query($qo, 'class', $connection);
                while ($row_group = $result_group->fetch_assoc()) {
                    $data[] = $row_group['name_group'];
                }
            }
		}
		return $data;
	}
	function getGroupsForStudentUpdate($row, $connection)
	{
		$data = getDataForStudentGroups($row, $connection);

		$result_all_group = getAllData('class', $connection);
		if ($result_all_group->num_rows > 0) {
			
			while ($ross = $result_all_group->fetch_assoc()) {
				$t = false;
				if (sizeof($data) > 0) {
					for($y=0; $y < sizeof($data); $y++){
						if ($ross['name_group'] == $data[$y]) {
							echo "<label>\n";
							echo "<input type='checkbox' atta='".$ross['id']."' name='checkboxname[]' value='".$ross['name_group']."' checked> ".$ross['name_group']."\n";
							echo "</label><br>";
							$t = true;
						}
					}   
				}
				
				if ($t != true) {
					echo "<label>\n";
					echo "<input type='checkbox' atta='".$ross['id']."' value='".$ross['name_group']."' name='checkboxname[]'> ".$ross['name_group']."\n";
					echo "</label><br>";
				}
			}
		}else{
				echo "Группы не добавлены";
		}
	}
?>