<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	$passwor = filter_var(trim($_POST['passwor']),
	FILTER_SANITIZE_STRING);

	$passwor = md5($passwor."qweqrwas432");

	$mysql = new mysqli('localhost','root','','bd_family');
	
	$result = $mysql->query("SELECT * FROM `accounts` WHERE `login`='$login' AND `passwor` = '$passwor'");
	$user = $result->fetch_assoc();
	if(count($user)==0){
		echo "Не найден пользователь";
		exit();
	}
	setcookie('user', $user['login'], time() + 3600, "/");

	$mysql->close();

	header('Location: /');
	exit();



?>