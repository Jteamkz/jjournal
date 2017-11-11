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
   			 $("#voprosP").append("<h5 id='slovo"+a+"''>Вопрос "+(a+1)+"</h5><input type='text' name='vopros"+a+"' placeholder='Вопрос'><br id='br"+a+"'><input type='text' class='rightanswer' name='right"+a+"' placeholder='Правильный ответ'><input class='wronganswer' type='text' name='wrong"+a+"0' placeholder='Неправильный ответ'><input class='wronganswer' type='text' name='wrong"+a+"1' placeholder='Неправильный ответ'><input class='wronganswer' type='text' name='wrong"+a+"2' placeholder='Неправильный ответ'><button type='button' id='"+a+"' class='deleteAns'>Удалить</button>");
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
			})
		
	});
	$(document).on('click', '.deleteAns', function(){
			var id = $(this).attr('id');
			$("#br"+id).remove();
			$("#slovo"+id).remove();
			$("input[name=vopros"+id+"]").remove();
			$("input[name=right"+id+"]").remove();
			$("input[name=wrong"+id+"0]").remove();
			$("input[name=wrong"+id+"1]").remove();
			$("input[name=wrong"+id+"2]").remove();
			for(var i=id; i<=a;i++){
				$("#br"+i).attr('id','br'+(i-1));
				$("#slovo"+i).html("Вопрос "+(i));
				$("#slovo"+i).attr('id','slovo'+(i-1));
				$("input[name=vopros"+i+"]").attr('name','vopros'+(i-1));
				$("input[name=right"+i+"]").attr('name','right'+(i-1));
				$("input[name=wrong"+i+"0]").attr('name','wrong'+(i-1)+'0');
				$("input[name=wrong"+i+"1]").attr('name','wrong'+(i-1)+'1');
				$("input[name=wrong"+i+"2]").attr('name','wrong'+(i-1)+'2');
				$('#'+i).attr('id',i-1);	
			}
			a--;
			$(this).remove();
		
	});
	});
	</script>
	<br><button type="button" id="ewevopros">Еще</button>
	<form method='post' id="voprosForm">
	<input type='text' name='name' placeholder='Название'>
	<input type='text' name='description' placeholder='Описание'>
		<h5 id="slovo0">Вопрос 1</h5>
		<input type='text' name='vopros0' placeholder='Вопрос'>
		<br id="br0"><input type='text' name='right0' placeholder='Правильный ответ' class="rightanswer">
			<input type='text' name='wrong00' placeholder='Неправильный ответ' class="wronganswer"><input type='text' name='wrong01' placeholder='Неправильный ответ' class="wronganswer"><input type='text' name='wrong02' placeholder='Неправильный ответ' class="wronganswer">
		<p id="voprosP"></p>
	<br><button id="addvopros">Add</button></form>