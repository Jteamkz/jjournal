<?php 
	session_start();
	$db_name = $_SESSION['studycenter'];

	include '../php/SQLconnect.php';
	include '../php/connectOS.php';
?>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<style>
		.deleteAns:hover{
			cursor:pointer;
		}
		.rightanswer:focus{
			border:1px solid #2ecc71;
			outline: 0;
		}
		.wronganswer:focus{
			border:1px solid #DC143C;
			outline: 0;
		}
		input[type=text]{
			  width: 200px;
			  height: 34px;
			  padding: 6px 12px;
			  font-size: 14px;
			  color: #555;
			  background-color: #fff;
			  border: 1px solid #ccc;
			  border-radius: 4px;
		}
		input[type=text] :focus{
			border-color: #66afe9;
  			outline: 0;
		}
		.rightanswer{
			border-color: green;
		}
	</style>
	<script>
		var a = "0";
		$(document).ready(function(){
		$("#ewevopros").click(function(){
			 a++;
   			 $("#voprosP").append("<h5 id='slovo"+a+"''>Вопрос "+(a+1)+"</h5><input type='text' name='vopros"+a+"' style='width:59.64%;' placeholder='Вопрос'><br id='br"+a+"'><div style='margin-top:5px;'><input type='text' style='margin-right:4px;' class='rightanswer' name='right"+a+"' placeholder='Правильный ответ'><input class='wronganswer' style='margin-right:4px;' type='text' name='wrong"+a+"0' placeholder='Неправильный ответ'><input class='wronganswer' style='margin-right:4px;' type='text' name='wrong"+a+"1' placeholder='Неправильный ответ'><input class='wronganswer' type='text' name='wrong"+a+"2' placeholder='Неправильный ответ'><img src='../img/delete.png' style='width:30px; height:30px' id='"+a+"' class='deleteAns'></div>");
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
				success:function(data){
                    window.location.assign('../admin_panel.php');
                }
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
	<body style="padding-left:5px;">
	<br><button type="button" id="ewevopros" class="btn">Еще</button>
	<form method='post' id="voprosForm">
		<div style="margin-top:5px;">
	<input type='text' name='name' placeholder='Название'>
	<input type='text' name='description' placeholder='Описание'>
		</div>
		<h5 id="slovo0">Вопрос 1</h5>
		<input type='text' name='vopros0' placeholder='Вопрос' style="width:59.64%;">
		<br id="br0">
		<div style="margin-top:5px;">
			<input type='text' name='right0' placeholder='Правильный ответ' class="rightanswer pp">
			<input type='text' name='wrong00' placeholder='Неправильный ответ' class="wronganswer np">
			<input type='text' name='wrong01' placeholder='Неправильный ответ' class="wronganswer np">
			<input type='text' name='wrong02' placeholder='Неправильный ответ' class="wronganswer np">
		</div>
		<p id="voprosP"></p>
	<br><button id="addvopros" class="btn">Добавить тест</button></form>
</body>