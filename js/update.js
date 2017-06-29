$(document).on('click',  '.saver', function(e){
		$shady = $(this).attr('shady');
		$spaceModalShady = '#squarespaceModal' + $shady;
		$izno = $($spaceModalShady).find("#IIIN").val();
		$formId = '#changeForm'+$shady;
		$form = $($spaceModalShady).find($formId);
		$changes = $form.serialize();
		e.preventDefault();
		alert($changes);
		$url = 'php/changeStudent.php?izno='+$izno+'&shady='+$shady;
		$div = "#div" + $shady;
		$tr = "#tr" + $shady;
		$str= " "+$tr;
		$.ajax({
			type: 'POST',
			url: $url,
			data: $changes,
			success: function(data){
				// alert($tr);
				// $("#mydiv").load( " #mydiv");
				$($tr).html(data);
			}
		})
});


	// $(document).on('click', '.btn-update', function(){
	// 	alert("first click");
	// 	$data = $(this).attr("data-target");
	// 	$shady = $($data).attr("shady");
	// 	$izno = $($data).find("#IIIN").val();
	// 	console.log($data);
	// 	$saveNew = '#saveNew' + $shady;
	// 	// alert($saveNew);	
	// 	$closeNew = '#closeNew' + $shady;
	// 	$formId = '#changeForm'+$shady;
	// 	$form = $($data).find($formId);
	// 	$($saveNew).on('click',  function(){
	// 		alert("second click");
				
	// 			// $saveButton = $($form).find("#saveNew");
	// 			$form.find('input').attr('disabled', 'disabled'); 
	// 			$changes = $form.serialize();
	// 			alert($izno);
	// 			alert($changes);
	// 			// alert($changes);
	// 			$url = "php/changeStudent.php?izno=";
	// 			$url = $url.concat($izno);
	// 			$.ajax({
	// 				type: 'POST',
	// 				url: $url,
	// 				data: $changes,
	// 				success: function(data){
	// 					$("#page-wrapper").load(" #page-wrapper");
	// 					// console.log($changes);
	// 					// $changes = 's';
	// 					return;
	// 				}
	// 			})
	// 	});
	// 	$($closeNew).on('click', function(){
	// 		return;
	// 	})
	// });
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