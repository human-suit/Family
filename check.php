<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	$passwor = filter_var(trim($_POST['passwor']),
	FILTER_SANITIZE_STRING);

	if (mb_strlen($login) < 4 || mb_strlen($login) > 90) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Регистрация</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Недопустимая длина логина
				</div>
				<div class="item2">
					 <a href="register.html">Выйти</a>
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
	}
	else if (mb_strlen($passwor) < 4 || mb_strlen($passwor) > 90) {
		?>
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Регистрация</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Недопустимая длина пароля
				</div>
				<div class="item2">
					 <a href="register.html">Выйти</a>
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
	}


	$passwor = md5($passwor."qweqrwas432");

	$mysql = new mysqli('localhost','root','','bd_family');
	$mysql->query("INSERT INTO `accounts` (`login`,`passwor`) VALUES ('$login','$passwor')");

	$mysql->close();

?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Регистрация</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Вы успешно зарегестрировали пользователя
				</div>
				<div class="item2">
					 <a href="index.html">Выйти</a>
				</div>
				</div>
			</div>
			<div class="pusto">
				
			</div>
		</div>
	</header>
</body>
</html>



