<?php

	$select_kto = filter_var(trim($_POST['select_kto']),
	FILTER_SANITIZE_STRING);
	$price = filter_var(trim($_POST['price']),
	FILTER_SANITIZE_STRING);
	$date_k = filter_var(trim($_POST['date_k']),
	FILTER_SANITIZE_STRING);
	$select_type = filter_var(trim($_POST['select_type']),
	FILTER_SANITIZE_STRING);
	$type = "Доход";

if (!ctype_digit($price) || $price < 0 || mb_strlen($price) < 1 || mb_strlen($price) > 10 ) {?>
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
					Ошибка стоимости!
				</div>
				<div class="item2">
					 <a href="create_doxoda.php">Выйти</a>
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
else if (mb_strlen($date_k) == "") {?>
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
					Не выбрали дату!
				</div>
				<div class="item2">
					 <a href="create_doxoda.php">Выйти</a>
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
	$mysql = new mysqli('localhost','root','','bd_family');

	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($_COOKIE['user'] == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}

	$poisk_ost = mysqli_query($mysql, "SELECT sum FROM `sum` WHERE id_accounta like $User_id"); 
	while($chels = mysqli_fetch_assoc($poisk_ost)) {
					$otv = $chels['sum'];
					$otv2 = $otv;
					$resultam = $otv2 + $price;
					$mysql->query("UPDATE sum
					SET sum = '$resultam' 
					where id_accounta = $User_id");
			
	}
	$mysql->query("INSERT INTO `spiski` (`name_kto`,`type_s`,`price`,`date_s`,`name_type_s`,`id_accounta`) VALUES ('$select_kto','$type','$price','$date_k','$select_type','$User_id')");


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
					Вы успешно создали доход
				</div>
				<div class="item2">
					 <a href="create_doxoda.php">Выйти</a>
				</div>
				</div>
			</div>
			<div class="pusto">
				
			</div>
		</div>
	</header>
</body>
</html>