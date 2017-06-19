<?php 
	session_start();
	$db_name = $_SESSION['studycenter'];

	include '../php/SQLconnect.php';
	include '../php/connectOS.php'
	?>
	<script>
		var a = "0";
		$("#eweTeacher").click(function(){
			 a++;
   			 $("#teacherP").append("<h5>teacher"+(a+1)+"</h5><input type='text' name='IIN"+a+"' placeholder='ИИН'><input type='text' name='password"+a+"' placeholder='Пароль'><input type='text' name='name"+a+"' placeholder='Имя'><input type='text' name='surname"+a+"' placeholder='Фамилия'><input type='text' name='father"+a+"'' placeholder='Отчество'><input type='text' name='birthday"+a+"' placeholder='День рождения'><input type='text' name='phone"+a+"' placeholder='Телефон'>");
   			 $.ajax({
		       url: 'add/teacherSelect.php?numberTeacher='+a,
		       success: function(html) {
          	$("#teacherP").append(html);
       }
    });
		});
	
			
	$(document).ready(function(){
	
			
	$("#addteacher").click(function(){
		
			
			var $form = $("#teacherForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/teacherAdd.php?numberTeacher='+a,
				type: 'POST',
				data: serializedData,
				success: function(data){
					 alert("Добавлено!!!");
				}
			})
		
	})
	})
	</script>
	<br><button id="eweTeacher">Еще</button>
	<form method='post' id="teacherForm">
		<div style="max-height:100px; height:100px; overflow-y: scroll; padding:10px;">
		<h5>teacher1</h5>
		<input type='text' name='IIN0' placeholder='ИИН'><input type='text' name='password0' placeholder='Пароль'>
			<input type='text' name='name0' placeholder='Имя'><input type='text' name='surname0' placeholder='Фамилия'>
			<input type='text' name='father0'' placeholder='Отчество'><input type='text' name='birthday0' placeholder='День рождения'>
			<input type='text' name='phone0' placeholder='Телефон'>
			<?php 
				echo "<select name='subject0'>";
			$sql = "SELECT * FROM subjects";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<option value='".$row['id']."'' title='".$row['description']."''>".$row['name']."</option>";
				    }
				} else {
				    echo "0 results";
				}
				echo "</select>";
			?><br>
		<p id="teacherP"></p>
		</div>
	<br><button id="addteacher">Add</button></form>