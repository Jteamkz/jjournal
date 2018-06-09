$(document).on('click',  '.saver_test', function(e){
		var idTest = $(this).attr('idTest');
		//$spaceModalShady = '#squarespaceModal' + $shady;

		//$izno = $($spaceModalShady).find("#IIIN").val();

		//$formId = '#changeForm'+$shady;
		var form = $('#changeForm'+idTest);
		var changes = form.serialize();
		e.preventDefault();
		$url = 'add/changeTest.php?test_id='+idTest;
		
		//$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			data: changes,
			success: function(data){
				sessionStorage.setItem("reloading", "true");
				location.reload();
				// $($tr).html(data);
				//console.log(this.load("php/teacher_part.php"));
			}
		})
});
$(document).on('click',  '.saver_teacher', function(e){
		$shady = $(this).attr('shady');
		$spaceModalShady = '#squarespaceModal' + $shady;

		$izno = $($spaceModalShady).find("#IIIN").val();

		$formId = '#changeForm'+$shady;
		$form = $($spaceModalShady).find($formId);
		$changes = $form.serialize();
		e.preventDefault();
		$url = 'php/changeTeacher.php?izno='+$izno+'&shady='+$shady;
		
		$tr = "#tr" + $shady;
		//alert($izno);
		$.ajax({
			type: 'POST',
			url: $url,
			data: $changes,
			success: function(data){
				sessionStorage.setItem("reloading", "true");
				location.reload();
			}
		})
});

$(document).on('click',  '.saver_group', function(e){
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
				//$($tr).html(data);
				sessionStorage.setItem("reloading", "true");
				location.reload();
			}
		})
});

$(document).on('click',  '.saver', function(e){
		$shady = $(this).attr('shady');
		$spaceModalShady = '#squarespaceModal' + $shady;
		$izno = $($spaceModalShady).find("#IIIN").val();
		$formId = '#changeForm'+$shady;
		$form = $($spaceModalShady).find($formId);
		$changes = $form.serialize();
		e.preventDefault();
		$url = 'php/changeStudent.php?izno='+$izno+'&shady='+$shady;
		$tr = "#tr" + $shady;
		
		$.ajax({
			type: 'POST',
			url: $url,
			data: $changes,
			success: function(data){
				//$($tr).html(data);
				sessionStorage.setItem("reloading", "true");
				location.reload();
			}
		})
});

$(document).on('click',  '.update_pass', function(e){
		//var idTest = $(this).attr('idTest');
		//$spaceModalShady = '#squarespaceModal' + $shady;

		//$izno = $($spaceModalShady).find("#IIIN").val();

		//$formId = '#changeForm'+$shady;
		var form = $('#changePass');
		var changes = form.serialize();
		e.preventDefault();
		$url = 'add/changePass.php';
		
		//$tr = "#tr" + $shady;

		$.ajax({
			type: 'POST',
			url: $url,
			data: changes,
			success: function(data){
				sessionStorage.setItem("reloading", "true");
				location.reload();
				// $($tr).html(data);
				//console.log(this.load("php/teacher_part.php"));
			}
		})
});

function beginSpin() {
	$("body").append("<div class='modal-backdrop fade in'><div style='display: table-cell; vertical-align: middle'><div class='sk-folding-cube'><div class='sk-cube1 sk-cube'></div><div class='sk-cube2 sk-cube'></div><div class='sk-cube4 sk-cube'></div><div class='sk-cube3 sk-cube'></div></div></div></div>");
}
function endSpin(){
	$(".modal-backdrop").remove();
}
$(document).ajaxStart(function(){
	beginSpin();
})
$(document).ajaxStop(function(){
	endSpin();
})
function notifyBars() {
	  if(! $('.alert-box').length) {
		$('<div class="alert-box success" style="z-index:9999999999;">Изменено</div>').prependTo('body').delay(800).fadeOut(200, function() {
				$('.alert-box').remove();
				});
	  };
};

window.onload = function() {
    var reloading = sessionStorage.getItem("reloading");
    if (reloading) {
        sessionStorage.removeItem("reloading");
        notifyBars();
    }
}