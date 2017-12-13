$(document).on('click',  '.delete_student', function(e){
        $shady = $(this).attr('shady');
        //alert("eminem");
		$student = $(this).attr('student');
		e.preventDefault();
		$url = 'php/deleteStudent.php?id='+$student;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				//location.reload();
				$($tr).html(data);
				// console.log(this.load("php/teacher_part.php"));
			}
		})
});

$(document).on('click',  '.delete_teacher', function(e){
        $shady = $(this).attr('shady');
		$teacher = $(this).attr('teacher');
		e.preventDefault();
		$url = 'php/deleteTeacher.php?id='+$teacher;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			success: function(data){
				$($tr).html(data);
			}
		})
});

$(document).on('click',  '.delete_group', function(e){
		$shady = $(this).attr('shady');
		$spaceModalShady = '#squarespaceModal' + $shady;

		$izno = $($spaceModalShady).find("#IID").val();

		$formId = '#changeForm'+$shady;
		$form = $($spaceModalShady).find($formId);
		$changes = $form.serialize();
		e.preventDefault();
		$url = 'php/changeGroup.php?izno='+$izno+'&shady='+$shady;
		$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			data: $changes,
			success: function(data){
				$($tr).html(data);
			}
		})
});