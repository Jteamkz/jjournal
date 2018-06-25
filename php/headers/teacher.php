<?php
	if(!isset($_SESSION['isTeacher'])){
		echo "<script>window.location.href = 'index';</script>";
	}
?>
  <nav class="navbar navbar-default navbar-jjournal navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $about['name']; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $db_name; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="php/exit"><i class="fa fa-fw fa-power-off"></i> Выйти</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav side-jjournal">
                    <li>
                        <a class="jjournal-white" href="teacher_panel"><i class="glyphicon glyphicon-home"> </i> Главная</a>
                    </li>
					<li>
                        <a  class="jjournal-white" href="teachers_ownschedule"><i class="glyphicon glyphicon-calendar"> </i> Мое расписание</a>
                    </li>
                    <li>
                        <a  class="jjournal-white" href="teacher_tests"><i class="glyphicon glyphicon-list-alt"> </i> Мои тесты</a>
                    </li>
					<li>
                        <a  class="jjournal-white" href="teacher_profile"><i class="glyphicon glyphicon-user"> </i> Мой профиль</a>
                    </li>
					<li>
                        <a  class="jjournal-white" href="admin_attendance"><i class="glyphicon glyphicon-check"></i> Посещаемость</a>
                    </li>
					<li>
                        <a  class="jjournal-white" href="admin_materials"><i class="glyphicon glyphicon-floppy-disk"></i> Материал</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>