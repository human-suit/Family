<?php
	$select_kto = filter_var(trim($_POST['select_kto']),
	FILTER_SANITIZE_STRING);
	$price = filter_var(trim($_POST['price']),
	FILTER_SANITIZE_STRING);;
	$date_k = filter_var(trim($_POST['date_k']),
	FILTER_SANITIZE_STRING);
	$select_type = filter_var(trim($_POST['select_type']),
	FILTER_SANITIZE_STRING);
	$type = "Доход";
	$mysql = new mysqli('localhost','root','','bd_family');

	if (mb_strlen($price) <= 1 || mb_strlen($name_c) > 40 ) {?>
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Цель</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Недопустимая длина !
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
	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	while ($login_s = mysqli_fetch_assoc($resulta)) {
		if($_COOKIE['user'] == $login_s['login']){
			$User_id=$login_s['id_accounta'];
		}
	}
			$resultv= mysqli_query($mysql, "SELECT `price` FROM `spiski` WHERE `id_accounta` like '$User_id' and `name_type_s` like '$select_type' and `date_s` like '$date_k' and `price` like '$price'  and `type_s` like '$type' and `name_kto` like '$select_kto'");
			$chew = mysqli_fetch_assoc($resultv);
	if(is_null($chew['price'])){
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
					Не найдено!
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
	else{

			$numer = $chew['price'];
			$sum = mysqli_query($mysql, "SELECT sum FROM `sum` WHERE id_accounta like $User_id;"); 
			$chel = mysqli_fetch_assoc($sum);
			$rashos = $chel['sum'];
			$resultam = $rashos - $numer;
			$mysql->query("UPDATE sum
			SET sum = '$resultam' 
			where id_accounta like '$User_id';");

		$mysql->query("DELETE FROM `spiski` WHERE `id_accounta` like '$User_id' and `name_type_s` like '$select_type' and `date_s` like '$date_k' and `price` like '$price'  and `type_s` like '$type' and `name_kto` like '$select_kto'");

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
					Успешное удаление!
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