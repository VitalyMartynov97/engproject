<?php 
	session_start();
	if (isset($_SESSION['user_id'])) {
    echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/client.php" />';
  } 
	require("head.php");
	echo '<div class="auth-inner">';
	if ($_GET['action']=="log") {
		echo '
			<h3>Авторизация</h3>
			<form method="post" action="php/login.php">
				<input type="text" name="login_login" placeholder="Логин..." required="" class="form-control mb-2">
				<input type="password" name="login_password" placeholder="Пароль..." required class="form-control mb-2">
				<input type="submit" name="login_sub" class="btn btn-success">
			</form>
			<span class="mt-2"><a href="auth.php?action=reg">Регистрация</a></span>
		';
	}
	else{
		echo '
			<h3>Регистрация</h3>
			<form method="post" action="php/reg.php">
				<input type="text" name="rg_login" placeholder="Логин..." required="" class="form-control mb-2">
				<input type="password" name="rg_password" placeholder="Пароль..." required class="form-control mb-2">
				<input type="text" name="rg_name" placeholder="Имя..." required="" class="form-control mb-2">
				<input type="text" name="rg_surname" placeholder="Фамилия..." required="" class="form-control mb-2">
				<input type="email" name="rg_email" placeholder="Email..." required="" class="form-control mb-2">
				<input type="text" name="rg_phone" placeholder="Телефон..." required class="form-control mb-2">
				<input type="text" name="rg_city" placeholder="Город..." class="form-control mb-2">
				<input type="text" name="rg_street" placeholder="Улица..." class="form-control mb-2">
				<input type="text" name="rg_house" placeholder="Дом..." class="form-control mb-2">
				<input type="submit" name="reg_sub" class="btn btn-success">
			</form>
			<span class="mt-2"><a href="auth.php?action=log">Авторизация</a></span>
		';
	}
	echo '</div>';
?>

<?php
	require("foo.php");
?>	