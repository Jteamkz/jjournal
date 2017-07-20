<?php 
	session_start();
	$db_name = $_SESSION['studycenter'];

	include '../php/SQLconnect.php';
	include '../php/connectOS.php'
	?>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script>
		var a = "0";
		$(document).ready(function(){
		$("#ewevopros").click(function(){
			 a++;
   			 $("#voprosP").append("<h5>Вопрос "+(a+1)+"</h5><input type='text' name='IIN"+a+"' placeholder='Вопрос'><text id='eweotvet'>Еще</text><br><input type='text' class='rightanswer' name='password"+a+"' placeholder='Правильный ответ'><input class='wronganswer' type='text' name='name"+a+"' placeholder='Неправильный ответ'>");
		});
	});
			
	$(document).ready(function(){


	$("#addvopros").click(function(){

			
			var $form = $("#voprosForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'testAdd.php?numbervopros='+a,
				type: 'POST',
				data: serializedData,
				success: function(data){
					 alert("Добавлено!!!");
				}
			})
		
	})
	})
	</script>
	<br><button id="ewevopros">Еще</button>
	<form method='post' id="voprosForm">
	<input type='text' name='name' placeholder='Название'>
	<input type='text' name='description' placeholder='Описание'>
		<h5>Вопрос 1</h5>
		<input type='text' name='IIN0' placeholder='Вопрос'><text class="eweotvet" id='eweotvet0'>Еще</text>
		<br><input type='text' name='password0' placeholder='Правильный ответ' class="rightanswer">
			<input type='text' name='name0' placeholder='Неправильный ответ' class="wronganswer">
			<p id="otvetP0"></p><br>
		<p id="voprosP"></p>
	<br><button id="addvopros">Add</button></form>