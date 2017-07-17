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
			    $("#mondayDiv").hide();
			    $("#tuesdayDiv").hide();
			    $("#wednesdayDiv").hide();
			    $("#thursdayDiv").hide();
			    $("#fridayDiv").hide();
			    $("#saturdayDiv").hide();
			    $("#sundayDiv").hide();
			    $("#mondayToggler").click(function(){
			        $("#mondayDiv").toggle(300);
			        $('input[name=mondayroom]').val("");
			        $('input[name=monday1]').val("");
			        $('input[name=monday2]').val("");
			        $('input[name=monday3]').val("");
			        $('input[name=monday4]').val("");
			    });
			    $("#tuesdayToggler").click(function(){
			        $("#tuesdayDiv").toggle(300);
			        $('input[name=tuesdayroom]').val("");
			        $('input[name=tuesday1]').val("");
			        $('input[name=tuesday2]').val("");
			        $('input[name=tuesday3]').val("");
			        $('input[name=tuesday4]').val("");
			    });
			    $("#wednesdayToggler").click(function(){
			        $("#wednesdayDiv").toggle(300);
			        $('input[name=wednesdayroom]').val("");
			        $('input[name=wednesday1]').val("");
			        $('input[name=wednesday2]').val("");
			        $('input[name=wednesday3]').val("");
			        $('input[name=wednesday4]').val("");
			    });
			    $("#thursdayToggler").click(function(){
			        $("#thursdayDiv").toggle(300);
			        $('input[name=thursdayroom]').val("");
			        $('input[name=thursday1]').val("");
			        $('input[name=thursday2]').val("");
			        $('input[name=thursday3]').val("");
			        $('input[name=thursday4]').val("");
			    });
			    $("#fridayToggler").click(function(){
			        $("#fridayDiv").toggle(300);
			        $('input[name=fridayroom]').val("");
			        $('input[name=friday1]').val("");
			        $('input[name=friday2]').val("");
			        $('input[name=friday3]').val("");
			        $('input[name=friday4]').val("");
			    });
			    $("#saturdayToggler").click(function(){
			        $("#saturdayDiv").toggle(300);
			        $('input[name=saturdayroom]').val("");
			        $('input[name=saturday1]').val("");
			        $('input[name=saturday2]').val("");
			        $('input[name=saturday3]').val("");
			        $('input[name=saturday4]').val("");
			    });
			    $("#sundayToggler").click(function(){
			        $("#sundayDiv").toggle(300);
			        $('input[name=sundayroom]').val("");
			        $('input[name=sunday1]').val("");
			        $('input[name=sunday2]').val("");
			        $('input[name=sunday3]').val("");
			        $('input[name=sunday4]').val("");
			    });
			});
</script>
	</head>

	<body>
	<div class="headerGroupAdding">
		<a href="../admin_panel.php">Назад</a>
	</div>
	<div class="formGroupAdding">
	<form method="post" action="groupAdd.php">
		<input type="text" placeholder="Название группы" name="name">
		<select name="subject" required>
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
		<select name="teacher" required>
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
		<br>
		Выберите учеников<br>
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
				<h5 class="togglerH5" id="mondayToggler">Понедельник</h5>
				<div id="mondayDiv">
					<input type="text" placeholder="Кабинет" name="mondayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="monday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="monday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="monday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="monday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="tuesdayToggler">Вторник</h5>
				<div id="tuesdayDiv">
					<input type="text" placeholder="Кабинет" name="tuesdayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="tuesday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="tuesday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="tuesday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="tuesday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="wednesdayToggler">Среда</h5>
				<div id="wednesdayDiv">
					<input type="text" placeholder="Кабинет" name="wednesdayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="wednesday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="wednesday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="wednesday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="wednesday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="thursdayToggler">Четверг</h5>
				<div id="thursdayDiv">
					<input type="text" placeholder="Кабинет" name="thursdayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="thursday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="thursday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="thursday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="thursday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="fridayToggler">Пятница</h5>
				<div id="fridayDiv">
					<input type="text" placeholder="Кабинет" name="fridayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="friday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="friday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="friday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="friday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="saturdayToggler">Суббота</h5>
				<div id="saturdayDiv">
					<input type="text" placeholder="Кабинет" name="saturdayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="saturday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="saturday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="saturday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="saturday4" maxlength="2">
				</div>
				<h5 class="togglerH5" id="sundayToggler">Воскресенье</h5>
				<div id="sundayDiv">
					<input type="text" placeholder="Кабинет" name="sundayroom">
					с <input type="text" placeholder="ч" style="width:23px" name="sunday1" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="sunday2" maxlength="2"> до <input type="text" placeholder="ч" style="width:23px" name="sunday3" maxlength="2"><input type="text" placeholder="м" style="width:23px" name="sunday4" maxlength="2">
				</div>
    	<button>Add a group</button>
    	</form>
	</div>
	</body>
</html>