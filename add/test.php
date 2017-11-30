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
		var a = 0;
		var answers = new Array();
		answers.push(2);
		$("voprosForm").attr('action','selectAns.php?array='+answers+'&numberquests='+a);
		$(document).ready(function(){
		$("#ewevopros").click(function(){
			 a++;
			 answers.push(2);
   			 $("#voprosP").append("<h5 id='slovo"+a+"''>Вопрос "+(a+1)+"</h5><input type='text' name='vopros"+a+"' style='width:59.64%;' placeholder='Вопрос'> <button type='button' value='"+a+"' class='addAnswer btn' id='addAnswer"+a+"'>+</button> <button type='button' id='removeAnswer"+a+"' value='"+a+"' class='removeAnswer btn'>-</button><img src='../img/delete.png' style='width:30px; height:30px;' id='"+a+"' class='deleteAns'><br id='br"+a+"'><div style='margin-top:5px;'><div id='"+a+"Div' style='margin-top:5px; width:62.64%;'><input type='text' id='answer"+a+"0' name='answer"+a+"0' placeholder='Вариант' class=''> <input type='text' id='answer"+a+"1' name='answer"+a+"1' placeholder='Вариант' class=''></div></div>");
   			 $("#voprosForm").attr('action','selectAns.php?array='+answers+'&numberquests='+a);
		});
	});
			
	$(document).ready(function(){


	/*$("#addvopros").click(function(){

			
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
		
	});*/
	$(document).on('click', '.deleteAns', function(){
			var id = $(this).attr('id');
			$("#br"+id).remove();
			$("#slovo"+id).remove();
			$("input[name=vopros"+id+"]").remove();
			$("#removeAnswer"+id).remove();
			$("#addAnswer"+id).remove();
			$("#"+id+"Div").remove();
			for(var i=0; i<answers[id];i++){
				$("#answer"+id.toString()+i.toString()).remove();
			}
			for(var i=id; i<=a;i++){
				console.log(i);
				$("#br"+i).attr('id','br'+(i-1));
				$("#slovo"+i).html("Вопрос "+(i));
				$("#slovo"+i).attr('id','slovo'+(i-1));
				$("#"+i+"Div").attr('id', (i-1)+'Div')
				$("#removeAnswer"+i).val((i-1));
				$("#removeAnswer"+i).attr('id','removeAnswer'+(i-1));
				$("#addAnswer"+i).val((i-1));
				$("#addAnswer"+i).attr('id','addAnswer'+(i-1));
				$("input[name=vopros"+i+"]").attr('name','vopros'+(i-1));
				for(var j=0; j<=answers[i]; j++){
					//console.log("#answer"+i.toString()+j.toString());
					$("#answer"+i.toString()+j.toString()).attr('name', 'answer'+(i-1)+''+j);
					$("#answer"+i.toString()+j.toString()).attr('id', 'answer'+(i-1)+''+j);
				}
				$('#'+i).attr('id',i-1);	
			}
			a--;
			$(this).remove();
			$("#voprosForm").attr('action','selectAns.php?array='+answers+'&numberquests='+a);
	});
	$(document).on('click', '.addAnswer', function(){ 
			var value = $(this).val();
			$("#"+value+"Div").append(" <input type='text' id='answer"+value+""+answers[value]+"' name='answer"+value+""+answers[value]+"' placeholder='Вариант'>");
			answers[value]++;
			$("#voprosForm").attr('action','selectAns.php?array='+answers+'&numberquests='+a);
	});
	$(document).on('click', '.removeAnswer', function(){ 
		var value = $(this).val();
   		if(answers[value] > 2){
   			$("#answer"+value.toString()+(answers[value]-1).toString()).remove();
   			answers[value]--;
   		}
   		$("#voprosForm").attr('action','selectAns.php?array='+answers+'&numberquests='+a);
	});
});
	</script>
	<body style="padding-left:5px;">
	<br><button type="button" id="ewevopros" class="btn">Еще</button>
	<form method='post' id="voprosForm" action="selectAns.php">
		<div style="margin-top:5px;">
	<input type='text' name='name' placeholder='Название'>
	<input type='text' name='description' placeholder='Описание'>
		</div>
		<h5 id="slovo0">Вопрос 1</h5>
		<input type='text' name='vopros0' placeholder='Вопрос' style="width:59.64%;"> <button type="button" value="0" class="addAnswer btn">+</button> <button type="button" value="0" class="removeAnswer btn">-</button>
		<br id="br0">
		<div id="0Div" style="margin-top:5px; width:62.64%;">
			<input type='text' id='answer00' name='answer00' placeholder='Вариант' class="">
			<input type='text' id='answer01' name='answer01' placeholder='Вариант' class="">
		</div>
		<p id="voprosP"></p>
	<br><button id="addvopros" class="btn">Добавить тест</button></form>
</body>