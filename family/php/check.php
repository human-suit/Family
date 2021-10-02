<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	$passwor = filter_var(trim($_POST['passwor']),
	FILTER_SANITIZE_STRING);
	$name_c = filter_var(trim($_POST['name_c']),
	FILTER_SANITIZE_STRING);
	$price = filter_var(trim($_POST['price']),
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

	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($login == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}
	$mysql->query("INSERT INTO `cheli` (`id_accounta`,`name_c`,`price`) VALUES ('$User_id','$name_c','$price')");

	$mysql->close();


	header('Location: /');




?>