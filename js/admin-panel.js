for(let field of $('.dateStudent').toArray()){
			  new Cleave(field, {
				date: true,
				delimiter : ".",
				datePattern: ['d', 'm', 'Y']
			  });
			}
			for(let field of $('.dateTeacher').toArray()){
			  new Cleave(field, {
				date: true,
				delimiter : ".",
				datePattern: ['d', 'm', 'Y']
			  });
			}
		var a = "0";
		$("#eweSubject").click(function(){
			 a++;
   			 $("#subjectP").append("<hr id='hrsubject"+a+"'><div class='row' id='subjectrow"+a+"'><div class='col-lg-6'><input type='text' class='form-control' id='subjectName"+a+"' name='name"+a+"' placeholder='Название'></div><div class='col-lg-6'><input class='form-control' type='text' placeholder='Описание' id='subjectDefenition"+a+"' name='defenition"+a+"' required></div></div>");
		});
	
			
	$(document).ready(function(){
	
			
	$("#addSubject").click(function(){
		
			
			var $form = $("#subjectForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/subjectAdd.php?numberSubject='+a,
				type: 'POST',
				data: serializedData,
				success: function(data){
					sessionStorage.setItem("reloading", "true");
					location.reload();
				}
			})
		
	});
	$("#eweSubjectdelete").click(function(){
		if(a>0){
			$("#subjectrow"+a).remove();
            $("#hrsubject"+a).remove();
			a = a - 1;
		}
	});
	})
		var b = "0";
		$("#eweStudent").click(function(){
			 b++;
   			 $("#studentP").append("<hr id='hrstudent"+b+"'><div class='row' id='studentrow"+b+"'><div class='col-lg-4'><input class='form-control' type='text' name='IIN"+b+"' placeholder='ИИН'></div><div class='col-lg-4'><input class='form-control' type='text' name='password"+b+"' placeholder='Пароль'></div><div class='col-lg-4'><input class='form-control' type='text' name='name"+b+"' placeholder='Имя'></div><div class='col-lg-4'><input class='form-control' type='text' name='surname"+b+"' placeholder='Фамилия'></div><div class='col-lg-4'><input class='form-control' type='text' name='father"+b+"'' placeholder='Отчество'></div><div class='col-lg-4'><input class='form-control dateStudent' type='text' name='birthday"+b+"' placeholder='День рождения'></div><div class='col-lg-4'><input class='form-control' type='text' name='phone"+b+"' placeholder='Телефон'></div><div class='col-lg-4'><input class='form-control' type='text' name='phoneparent"+b+"' placeholder='Телефон Мамки'></div></div>");
			 for(let field of $('.dateStudent').toArray()){
			  new Cleave(field, {
				date: true,
				delimiter : ".",
				datePattern: ['d', 'm', 'Y']
			  });
			}
		});
	
			
	$(document).ready(function(){
	
			
	$("#addStudent").click(function(){
		
			
			var $form = $("#studentForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/studentAdd.php?numberStudent='+b,
				type: 'POST',
				data: serializedData,
				success: function(data){
					sessionStorage.setItem("reloading", "true");
					location.reload();
				}
			})
		
	});
	$("#eweStudentdelete").click(function(){
		if(b > 0){
			$("#studentrow"+b).remove();
			$(" #hrstudent"+b ).remove();
			b = b - 1;
		}
	});
	})
		var c = 0;
		$("#eweTeacher").click(function(){
			 c++;
   			 $.ajax({
		       url: 'add/teacherSelect.php?numberTeacher='+c,
		       success: function(html) {
          	$("#teacherP").append(html);
			for(let field of $('.dateTeacher').toArray()){
			  new Cleave(field, {
				date: true,
				delimiter : ".",
				datePattern: ['d', 'm', 'Y']
			  });
			}
       }
    });
		});
	
			
	$(document).ready(function(){
	
			
	$("#addteacher").click(function(){
		
			
			var $form = $("#teacherForm");

			var serializedData = $form.serialize();
			
			$.ajax({
				url: 'add/teacherAdd.php?numberTeacher='+c,
				type: 'POST',
				data: serializedData,
				success: function(data){
					sessionStorage.setItem("reloading", "true");
					location.reload();
				}
			})
		
	});
	$("#eweTeacherdelete").click(function(){
		if(c>0){
			$("#teacherrow"+c).remove();
			$(" #hrteacher"+c ).remove();
            $("#subjectTeacher"+c).remove();
			c = c - 1;
		}
	});
	})
	function notifyBar() {
	  if(! $('.alert-box').length) {
		$('<div class="alert-box success" style="z-index:9999999999;">Добавлено</div>').prependTo('body').delay(800).fadeOut(200, function() {
				$('.alert-box').remove();
				});
	  };
	};
	window.onload = function() {
		var reloading = sessionStorage.getItem("reloading");
		if (reloading) {
			sessionStorage.removeItem("reloading");
			notifyBar();
		}
	}