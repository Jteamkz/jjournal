<!DOCTYPE html>
<html>
<head>
	<title>Thousand CRM system</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<form action="php/login/login.php" method="POST">
		<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="user_name" id="inputEmail" class="form-control" placeholder="Логин" required autofocus><br>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required><br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Войти</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
	</form>

	<div style="position: fixed; bottom: 0; right: 0">
		<?php 
			include 'php/version.php';
			echo " ".phpversion();
		?>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</html>