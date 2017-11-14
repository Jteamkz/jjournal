<?php
			session_start();
			$db_name = $_SESSION['studycenter'];
?>
<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
	    <script src="../js/jquery.js"></script>
	    <script src="../js/bootstrap.js"></script>
		<?php 
			include '../php/SQLconnect.php';
			include '../php/connectOS.php';
		?>
		<script>
			$(document).ready(function(){
				$("#toggling").hide();
			    $("#toggler").click(function(){
			        $("#toggling").toggle(500);
			    });
			var array = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
			for(var i = 0; i<7; i++){
				document.getElementById(array[i] + "room").disabled = true;
				document.getElementById(array[i] + "room").name = array[i] + "room";
			    document.getElementById(array[i] + "1").disabled = true;
			    document.getElementById(array[i] + "1").name = array[i] + "1";
			    document.getElementById(array[i] + "2").disabled = true; 
			    document.getElementById(array[i] + "2").name = array[i] + "2";
			    document.getElementById(array[i] + "3").disabled = true; 
			    document.getElementById(array[i] + "3").name = array[i] + "3";
			    document.getElementById(array[i] + "4").disabled = true; 
			    document.getElementById(array[i] + "4").name = array[i] + "4";
			}
			    $("input[type=checkbox]").click(function(){
			    		var id = $(this).val();
			    		console.log(id);
			        	if(document.getElementById(id+"room").disabled==true){
			        		document.getElementById(id + "room").disabled = false; 
			        		document.getElementById(id + "1").disabled = false; 
			        		document.getElementById(id + "2").disabled = false; 
			        		document.getElementById(id + "3").disabled = false; 
			        		document.getElementById(id + "4").disabled = false; 
			        	}else{
			        		document.getElementById(id + "room").disabled = true; 
			        		document.getElementById(id + "1").disabled = true; 
			        		document.getElementById(id + "2").disabled = true; 
			        		document.getElementById(id + "3").disabled = true; 
			        		document.getElementById(id + "4").disabled = true; 
			        	}
			    });
			});
</script>
	</head>
<style>
		input[type=checkbox]{
			cursor:pointer;
		}
		input[type=text], select{
			  width: 190px;
			  height: 34px;
			  padding: 3px 3px;
			  font-size: 14px;
			  color: #555;
			  background-color: #fff;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  margin-bottom:5px;
			  margin-right:5px;
		}
		input[type="text"]:disabled{
			background:#C0C0C0;
		}
		input[type=text] :focus{
			border-color: #66afe9;
  			outline: 0;
		}
		select :focus{
			border-color: #66afe9;
  			outline: 0;
		}
				-webkit-scrollbar-track
		{
			border: 1px solid #cccccc;
			background-color: #cccccc;
		}

		::-webkit-scrollbar
		{
			width: 10px;
			background-color: white;
		}

		::-webkit-scrollbar-thumb
		{
			background-color: #cccccc;	
		}
	</style>
	<body>
	<div class="formGroupAdding">
	<form method="post" action="groupAdd.php">
		<div class="row">
			<div class="col-xs-6">
		<input type="text" placeholder="Название группы" name="name">
		<select style="margin-left:15px; margin-right:5px" name="subject" required>
		<option value="" disabled selected>Выберите предмет</option>
			<?php
				$sql = "SELECT * FROM subjects";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."'' title='".$row['description']."''>".$row['name']."</option>";
				    }
				} else {
				    
				}
			?>
		</select>
		<select style="margin-left:10px" name="teacher" required>
		<option value="" disabled selected>Выберите учителя</option>
			<?php
				$sql = "SELECT * FROM teacher";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."'' title='teacher''>".$row['firstname']." ".$row['lastname']." ".$row['fathername']."</option>";
				    }
				} else {
				    
				}
			?>
		</select>
	<style>
		.dender{
			height:100px;
		}
	</style>
		<div class="row">
			<div class="col-xs-4">
				<div class="dender">
		<h5 class="togglerH5" id="mondayToggler">Понедельник <input id="mondayCheck" value="monday" style="float:right;" type="checkbox"></h5>
				<div id="mondayDiv">
					<input type="text" placeholder="Кабинет" id="mondayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="monday1" maxlength="2" ><input type="text" placeholder="м" style="width:23px" id="monday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="monday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="monday4" maxlength="2">
				</div>
			</div>
			</div>
			<div class="col-xs-4">
				<div class="dender">
				<h5 class="togglerH5" id="tuesdayToggler">Вторник <input style="float:right;" value="tuesday" type="checkbox"></h5>
				<div id="tuesdayDiv">
					<input type="text" placeholder="Кабинет" id="tuesdayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="tuesday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="tuesday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="tuesday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="tuesday4" maxlength="2">
				</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="dender">
				<h5 class="togglerH5" id="wednesdayToggler">Среда <input style="float:right;" value="wednesday" type="checkbox"></h5>
				<div id="wednesdayDiv">
					<input type="text" placeholder="Кабинет" id="wednesdayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="wednesday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="wednesday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="wednesday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="wednesday4" maxlength="2">
				</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="dender">
				<h5 class="togglerH5" id="thursdayToggler">Четверг <input style="float:right;" value="thursday" type="checkbox"></h5>
				<div id="thursdayDiv">
					<input type="text" placeholder="Кабинет" id="thursdayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="thursday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="thursday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="thursday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="thursday4" maxlength="2">
				</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="dender">
				<h5 class="togglerH5" id="fridayToggler">Пятница <input style="float:right;" value="friday" type="checkbox"></h5>
				<div id="fridayDiv">
					<input type="text" placeholder="Кабинет" id="fridayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="friday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="friday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="friday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="friday4" maxlength="2">
				</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="dender">
				<h5 class="togglerH5" id="saturdayToggler">Суббота <input style="float:right;" value="saturday" type="checkbox"></h5>
				<div id="saturdayDiv">
					<input type="text" placeholder="Кабинет" id="saturdayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="saturday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="saturday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="saturday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="saturday4" maxlength="2">
				</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="dender">
				<h5 class="togglerH5" id="sundayToggler">Воскресенье <input style="float:right;" value="sunday" type="checkbox"></h5>
				<div id="sundayDiv">
					<input type="text" placeholder="Кабинет" id="sundayroom">
					с <input type="text" placeholder="ч" style="width:23px" id="sunday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="sunday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" id="sunday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" id="sunday4" maxlength="2">
				</div>
			</div>
			</div>
		</div>
		</div>
		<div class="col-xs-6">
			Выберите учеников<br>
			<div style="overflow-y:scroll; min-height:500px; max-height:500px; border-top:1px solid #cccccc;">
		<?php
				$sql = "SELECT * FROM student WHERE bool='true'";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<input name='checkbox[]' type='checkbox'  id='".$row['id']."'  value='".$row['id']."'/>".$row['firstname']." ".$row['lastname']." ".$row['father']."<br>";
				    }
				} else {
				    
				}
				echo "<a id='toggler'>Показать все</a><br>";
				$sql = "SELECT * FROM student WHERE bool='false'";
				$result = $con->query($sql);
					echo "<div id='toggling'>";
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<input name='checkbox[]' type='checkbox'  value='".$row['id']."'/>".$row['firstname']." ".$row['lastname']." ".$row['father']."<br>";
				    }
				} else {
				    
				}
				echo "</div>";
			?>
		</div>
		</div>
	</div>
    	<button style="float:right; border-radius: 0px; color:white; margin-top:15px; background-color: #2ecc71" class="btn">Добавить группу</button>
    	</form>
	</div>
	</body>
</html>