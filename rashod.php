<?php

	$name_c = filter_var(trim($_POST['name_c']),
	FILTER_SANITIZE_STRING);
	if($name_c =="name_kto"){
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Доход</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Нет цели!
				</div>
				<div class="item2">
					 <a href="index.php">Выйти</a>
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
	setcookie('name_c', $name_c, time() + 3600, "/");
	$rashos = filter_var(trim($_POST['rashos']),
	FILTER_SANITIZE_STRING);
	if($rashos < 0){
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Доход</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Число с минусом!
				</div>
				<div class="item2">
					 <a href="index.php">Выйти</a>
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
	//Подключения к бд
    $mysql = new mysqli('localhost','root','','bd_family'); 
    $resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	//цикл для получения нужного аккаунта
	while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($_COOKIE['user'] == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}
	$naxod_sum = mysqli_query($mysql, "SELECT SUM(price) AS user_ras FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE'Расход'  ");

	while($chels = mysqli_fetch_assoc($naxod_sum)) {
		$ras = $chels['user_ras'];
	}

	$poisk_os = mysqli_query($mysql, "SELECT sum FROM `sum` WHERE id_accounta like $User_id"); 
	while($chels = mysqli_fetch_assoc($poisk_os)) {
					$res = $chels['sum'];
					$vas = $chels['sum'];
					$res = $res - $ras;
					$res = $res - $rashos;
					if($res <= 0 ){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Доход</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Слишком много!
				</div>
				<div class="item2">
					 <a href="index.php">Выйти</a>
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
					$vas = $vas - $rashos;
					$mysql->query("UPDATE sum
					SET sum = '$vas' 
					where id_accounta = $User_id");
				
	}
	$poisk_ost = mysqli_query($mysql, "SELECT rashod_cheli FROM `cheli` WHERE id_accounta like $User_id and name_c like'$name_c'"); 
	while($chels = mysqli_fetch_assoc($poisk_ost)) {
					$otv = $chels['rashod_cheli'];
					$otv2 = $otv;
					$resultam = $otv2 + $rashos;
					$mysql->query("UPDATE cheli
					SET rashod_cheli = '$resultam' 
					where id_accounta like '$User_id' and name_c like '$name_c'");


	}
	$mysql->close();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Доход</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Успешно отправлено!
				</div>
				<div class="item2">
					 <a href="index.php">Выйти</a>
				</div>
				</div>
			</div>
			<div class="pusto">
				
			</div>
		</div>
	</header>
</body>
</html>
		