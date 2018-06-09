$(document).on('click',  '.delete_student', function(e){
        $shady = $(this).attr('shady');
        //alert("eminem");
		$student = $(this).attr('student');
		$iin = $(this).attr('iin');
		e.preventDefault();
		$url = 'php/deleteStudent.php?id='+$student+'&iin='+$iin;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				//location.reload();
				notifyBar();
				$($tr).html(data);
				// console.log(this.load("php/teacher_part.php"));
			}
		})
});

$(document).on('click',  '.delete_test', function(e){
        $shady = $(this).attr('shady');
        //alert("eminem");
		$test = $(this).attr('test');
		e.preventDefault();
		$url = 'php/deleteTest.php?id='+$test;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				//location.reload();
				notifyBar();
				$($tr).html(data);
				// console.log(this.load("php/teacher_part.php"));
			}
		})
});

$(document).on('click',  '.delete_teacher', function(e){
        $shady = $(this).attr('shady');
		$teacher = $(this).attr('teacher');
		$iin = $(this).attr('iin');
		e.preventDefault();
		$url = 'php/deleteTeacher.php?id='+$teacher+'&iin='+$iin;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				notifyBar();
				$($tr).html(data);
			}
		})
});

$(document).on('click',  '.delete_group', function(e){
        $shady = $(this).attr('shady');
		$teacher = $(this).attr('group');
		$schedule_id = $(this).attr('schedule');
		e.preventDefault();
		$url = 'php/deleteGroup.php?id='+$teacher+'&schedule_id='+$schedule_id;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				notifyBar();
				$($tr).html(data);
			}
		})
});

$(document).on('click',  '.delete_subject', function(e){
        $shady = $(this).attr('shady');
        //alert("eminem");
		$student = $(this).attr('subject');
		e.preventDefault();
		$url = 'php/deleteSubject.php?id='+$student;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				notifyBar();
				//location.reload();
				$($tr).html(data);
				// console.log(this.load("php/teacher_part.php"));
			}
		})
});
function notifyBar() {
	  if(! $('.alert-box').length) {
		$('<div class="alert-box success" style="z-index:9999999999;">Удалено</div>').prependTo('body').delay(800).fadeOut(200, function() {
				$('.alert-box').remove();
				});
	  };
};