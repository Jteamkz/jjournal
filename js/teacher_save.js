$(document).on('click', '.saveTestToGroup', function(e){
    $url = "php/teacher_panel/addTestToClass.php";
    $data = $(document).find("#testAddToClassForm").serialize();
    e.preventDefault();
    alert($data);
    $.ajax({
        type: 'POST',
        url: $url,
        data: $data,
        success: function(data){
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