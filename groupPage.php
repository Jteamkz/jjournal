<?php 
session_start();
$db_name = $_SESSION['studycenter'];

include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
include 'php/SQLconnect.php';
include 'php/connectOS.php';
$connection->set_charset("utf8");
$just = getAllData('about', $connection);
$about = $just->fetch_assoc();
unset($just);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/teacher.css" type="text/css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <?php 
            include 'php/SQLconnect.php';
            include 'php/connectOS.php';
        ?>
        <script>
            $(document).ready(function(){
                $("#toggling").hide();
                $("#toggler").click(function(){
                    $("#toggling").slideToggle(800);
                    if($("#toggler").html() == "Показать студентов привязанных к группам")
                    	setTimeout(
						  function() 
						  {
						    $("#toggler").html("Скрыть лишнийх студентов");
						  }, 400);
                    else
                    	setTimeout(
						  function() 
						  {
						    $("#toggler").html("Показать студентов привязанных к группам");
						  }, 400);
                });
            var array = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
            for(var i = 0; i<7; i++){
                document.getElementById(array[i] + "room").disabled = true;
                document.getElementById(array[i] + "room").name = array[i] + "room";
                document.getElementById(array[i] + "1").disabled = true;
                document.getElementById(array[i] + "1").name = array[i] + "1";
                document.getElementById(array[i] + "2").disabled = true; 
                document.getElementById(array[i] + "2").name = array[i] + "2";
                document.getElementById(array[i] + "3").disabled = true; 
                document.getElementById(array[i] + "3").name = array[i] + "3";
                document.getElementById(array[i] + "4").disabled = true; 
                document.getElementById(array[i] + "4").name = array[i] + "4";
            }
                $(".dender input[type=checkbox]").click(function(){
                        var id = $(this).val();
                        
                        if(document.getElementById(id + "Check").checked==true){
                            document.getElementById(id + "Check").checked= false;
                            document.getElementById(id + "room").disabled = true; 
                            document.getElementById(id + "1").disabled = true; 
                            document.getElementById(id + "2").disabled = true; 
                            document.getElementById(id + "3").disabled = true; 
                            document.getElementById(id + "4").disabled = true; 
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                        }else{
                        	document.getElementById(id + "room").disabled = false; 
                            document.getElementById(id + "1").disabled = false; 
                            document.getElementById(id + "2").disabled = false; 
                            document.getElementById(id + "3").disabled = false; 
                            document.getElementById(id + "4").disabled = false;
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                            document.getElementById(id + "Check").checked = true;
                        }
                });
                $(".jjournal-orders input[type=checkbox]").click(function(){
                        var id = $(this).val();
                        console.log(id);
                        if(document.getElementById("checkSt" + id).checked==true){
                            document.getElementById("checkSt" + id).checked= false;
                        }else{
                            document.getElementById("checkSt" + id).checked = true;
                        }
                });
                $("li").click(function(){
                        var id = $(this).attr('id');
                        if(document.getElementById("checkSt" + id).checked==true){
                            document.getElementById("checkSt" + id).checked= false;
                        }else{
                            document.getElementById("checkSt" + id).checked = true;
                        }
                });
                $("H5").click(function(){
                        var id = $(this).attr('shama');
                        if(document.getElementById(id + "Check").checked==true){
                            document.getElementById(id + "Check").checked= false;
                            document.getElementById(id + "room").disabled = true; 
                            document.getElementById(id + "1").disabled = true; 
                            document.getElementById(id + "2").disabled = true; 
                            document.getElementById(id + "3").disabled = true; 
                            document.getElementById(id + "4").disabled = true; 
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                        }else{
                        	document.getElementById(id + "room").disabled = false; 
                            document.getElementById(id + "1").disabled = false; 
                            document.getElementById(id + "2").disabled = false; 
                            document.getElementById(id + "3").disabled = false; 
                            document.getElementById(id + "4").disabled = false;
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                            document.getElementById(id + "Check").checked = true;
                        }
                });
				$("label").click(function(){
                        var id = $(this).attr('shama');
                        if(document.getElementById(id + "Check").checked==true){
                            document.getElementById(id + "Check").checked= false;
                            document.getElementById(id + "room").disabled = true; 
                            document.getElementById(id + "1").disabled = true; 
                            document.getElementById(id + "2").disabled = true; 
                            document.getElementById(id + "3").disabled = true; 
                            document.getElementById(id + "4").disabled = true; 
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                        }else{
                        	document.getElementById(id + "room").disabled = false; 
                            document.getElementById(id + "1").disabled = false; 
                            document.getElementById(id + "2").disabled = false; 
                            document.getElementById(id + "3").disabled = false; 
                            document.getElementById(id + "4").disabled = false;
                            document.getElementById(id + "room").value = ""; 
                            document.getElementById(id + "1").value = ""; 
                            document.getElementById(id + "2").value = ""; 
                            document.getElementById(id + "3").value = ""; 
                            document.getElementById(id + "4").value = ""; 
                            document.getElementById(id + "Check").checked = true;
                        }
                });
            });
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JJournal</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">    

    <link href="css/plugins/morris.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/custum.css">

</head>

<body>

    <div id="wrapper">
		<?php include "php/headers/admin.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="formGroupAdding">
    <form method="post" action="add/groupAdd">
        <div class="row">
            <div class="col-lg-8">
            	<div class="row">
            		<div class="col-lg-4">
        <input type="text" placeholder="Название группы" name="name">
        			</div>
        			<div class="col-lg-4">
        <select style="" name="subject" id='subjectTeacher' required>
        <option value="" disabled selected>Выберите предмет</option>
            <?php
                $sql = "SELECT * FROM subjects";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['id']."'' title='".$row['description']."''>".$row['name']."</option>";
                    }
                } else {
                    
                }
            ?>
        </select>
        		</div>
        		<div class="col-lg-4">
        <select name="teacher" id='teacherSubject' required>
        <option value="" disabled selected>Выберите учителя</option>
        </select>
    		</div>
    	</div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='monday' class="togglerH5" id="mondayToggler">Понедельник 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="mondayCheck" value="monday" type="checkbox">
                        <label shama='monday' for="mondayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="mondayDiv">
                    <input type="text" placeholder="Кабинет" id="mondayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="monday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="monday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="monday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="monday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
			<div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='tuesday' class="togglerH5" id="tuesdayToggler">Вторник 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="tuesdayCheck" value="tuesday" type="checkbox">
                        <label shama='tuesday' for="tuesdayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="tuesdayDiv">
                    <input type="text" placeholder="Кабинет" id="tuesdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="tuesday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="tuesday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="tuesday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="tuesday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
			<div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='wednesday' class="togglerH5" id="wednesdayToggler">Среда 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="wednesdayCheck" value="wednesday" type="checkbox">
                        <label shama='wednesday' for="wednesdayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="wednesdayDiv">
                    <input type="text" placeholder="Кабинет" id="wednesdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="wednesday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="wednesday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="wednesday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="wednesday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
        </div>
		<div class="row">
            <div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='thursday' class="togglerH5" id="thursdayToggler">Четверг 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="thursdayCheck" value="thursday" type="checkbox">
                        <label shama='thursday' for="thursdayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="thursdayDiv">
                    <input type="text" placeholder="Кабинет" id="thursdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="thursday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="thursday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="thursday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="thursday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
			<div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='friday' class="togglerH5" id="fridayToggler">Пятница 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="fridayCheck" value="friday" type="checkbox">
                        <label shama='friday' for="fridayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="fridayDiv">
                    <input type="text" placeholder="Кабинет" id="fridayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="friday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="friday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="friday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="friday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
			<div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='saturday' class="togglerH5" id="saturdayToggler">Суббота 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="saturdayCheck" value="saturday" type="checkbox">
                        <label shama='saturday' for="saturdayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="saturdayDiv">
                    <input type="text" placeholder="Кабинет" id="saturdayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="saturday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="saturday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="saturday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="saturday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
        </div>
		<div class="row">
            <div class="col-lg-4">
                <div class="dender">
				<div class="shadow">
                            <div class="jjournal-panel-top" style="padding-left:10px;">
                                <h5 shama='sunday' class="togglerH5" id="sundayToggler">Воскресенье 
		<div class="checkboxGroup checkboxGroup-info">
                        <input id="sundayCheck" value="sunday" type="checkbox">
                        <label shama='sunday' for="sundayCheck">
                        </label>
                    </div></h5>
                            </div>
                            <div class="box-s"><div class="chunks-s">
                                            <div id="sundayDiv">
                    <input type="text" placeholder="Кабинет" id="sundayroom"><br>
                    с <input type="text" placeholder="чч" style="width:30px;" id="sunday1" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="sunday2" maxlength="2"> до <input type="text" placeholder="чч" style="width:30px;" id="sunday3" maxlength="2"> : <input type="text" placeholder="мм" style="width:30px;" id="sunday4" maxlength="2">
                </div>
                                        </div>
                            </div>
                        </div>
            </div>
            </div>
			</div>
        </div>
		Выберите учеников <br>
        <div class="col-lg-4" style='background-color: white;padding:0px;'>
            <div style="overflow-y:scroll; overflow-x:hidden; min-height:400px; max-height:400px;">
			<input type="text" id="searchStudents">
        <?php
                $sql = "SELECT * FROM student WHERE bool='true'";
                $result = $con->query($sql);
                echo "<ul class='jjournal-orders'>";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='".$row['id']."'><text>".$row['firstname']." ".$row['lastname']." ".$row['fathername']."</text><div class='checkboxGroup checkboxGroup-info'> <input name='checkbox[]' id='checkSt".$row['id']."' type='checkbox' style='float:right; margin-right:10px;' value='".$row['id']."'/> <label shama='tuesday' for='tuesdayCheck'> </label> </div></li>";
                    }
                } else {
                    
                }
                echo "</ul>";
                echo "<a id='toggler'>Показать студентов привязанных к группам</a><br>";
                $sql = "SELECT * FROM student WHERE bool='false'";
                $result = $con->query($sql);
                    echo "<div id='toggling'>";
                    echo "<ul class='jjournal-orders'>";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li id='".$row['id']."'><text>".$row['firstname']." ".$row['lastname']." ".$row['fathername']."</text><div class='checkboxGroup checkboxGroup-info'> <input name='checkbox[]' id='checkSt".$row['id']."' type='checkbox' style='float:right; margin-right:10px;' value='".$row['id']."'/> <label shama='tuesday' for='tuesdayCheck'> </label> </div></li>";
                    }
                } else {
                    
                }
                echo "</ul>";
                echo "</div>";
            ?>
        </div>
    </div>
        </div>
    </div>
        <button style="float:right; border-radius: 0px; color:white; margin-top:15px; background-color: #2ecc71" class="btn">Добавить группу</button>
        </form>
    </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="js/jquery.js"></script>

    <script src="js/actions.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script>
            $("#subjectTeacher").on("change paste keyup", function() {
                var c = $("#subjectTeacher").val();
                $("#teacherSubject").empty();
                if(!$("#subjectTeacher").val()){
                    $("#teacherSubject").empty();
                }else{
                $.ajax({
		       url: 'add/teacherZhen.php?id_s='+c,
		       success: function(html) {
          	$("#teacherSubject").append(html);
                    }
                });
            }
            });
			$("#searchStudents").on("change paste keyup", function() {
                var search = $("#searchStudents").val();
				var lis = $(".jjournal-orders li");
				var texts = $(".jjournal-orders li text");
				
				for(var i = 0; i < texts.length; i++){
					if(!contains(search, texts[i].innerHTML)){
						$(lis[i]).css("display","none");
					}else{
						$(lis[i]).css("display","block");
					}
				}
            });
			function contains(chars, word){
				// console.log(word.length - chars.length);
				for(var i = 0; i < word.length - chars.length; i++){
					// console.log(substr(word, i, i + chars.length - 1)+" "+chars);
					if(substr(word, i, i + chars.length - 1) == chars){
						return true;
					}
				}
				return false;
			}
			function substr(word, k, end){
				var new_word = "";
				for(var i = k; i <= end; i++){
					new_word = new_word + word[i];
				}
				return new_word;
			}
        </script>
</body>

</html>
