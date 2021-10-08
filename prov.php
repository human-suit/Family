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
		?>
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Вход</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Не найден пользователь
				</div>
				<div class="item2">
					 <a href="vxod.php">Выйти</a>
				</div>
				</div>
			</div>
			<div class="pusto">
				
			</div>
		</div>
	</header>
</body>
</html>
<?php
		exit();
	}	setcookie('user', $user['login'], time() + 3600, "/");

	$mysql->close();

	header('Location: /');
	exit();



?>