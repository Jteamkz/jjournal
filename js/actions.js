$(document).ready(function(){
                 $("#uroki").click(function(){
                     $("#urokitab").load("add/subject.html");
                 });

                 $("#ucheniki").click(function(){
                     $("#uchenikitab").load("add/student.html");
                 });

                 $("#uchiteli").click(function(){
                     $("#uchitelitab").load("add/teacher.php");
                 });
});