<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	$passwor = filter_var(trim($_POST['passwor']),
	FILTER_SANITIZE_STRING);

	if (mb_strlen($login) < 4 || mb_strlen($login) > 90) {
		echo "Недопустимая длина логина";
		exit();
	}
	else if (mb_strlen($passwor) < 4 || mb_strlen($passwor) > 90) {
		echo "Недопустимая длина пароля";
		exit();
	}


	$passwor = md5($passwor."qweqrwas432");

	$mysql = new mysqli('localhost','root','','bd_family');
	$mysql->query("INSERT INTO `accounts` (`login`,`passwor`) VALUES ('$login','$passwor')");

	$mysql->close();


	header('Location: /');




?>