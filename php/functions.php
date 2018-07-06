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
?>