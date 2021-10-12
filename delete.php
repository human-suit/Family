<?php
	
	$mysql = new mysqli('localhost','root','','bd_family');
	$resulta = mysqli_query($mysql, "SELECT * FROM `cheli`");
	$name_c = filter_var(trim($_POST['name_c']),
	FILTER_SANITIZE_STRING);

	if (mb_strlen($name_c) <= 1 || mb_strlen($name_c) > 40 ) {?>
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
					Недопустимая длина имени!
				</div>
				<div class="item2">
					 <a href="chel.php">Выйти</a>
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

	$result= mysqli_query($mysql, "SELECT * FROM `cheli`");


	while ($login_s = mysqli_fetch_assoc($resulta)) {
		if($_COOKIE['user'] == $login_s['login']){
			$User_id=$login_s['id_accounta'];
		}
	}
	while ($name_cheli = mysqli_fetch_assoc($result)) {
		if($name_c == $name_cheli['name_c']){

			$resul= mysqli_query($mysql, "SELECT rashod_cheli FROM `cheli` WHERE `id_accounta` like '$User_id' and name_c like'$name_c';");
			$che = mysqli_fetch_assoc($resul);
			$numer2 = $che['rashod_cheli'];

			$resultv= mysqli_query($mysql, "SELECT price FROM `cheli` WHERE `id_accounta` like '$User_id' and name_c like'$name_c';");
			$chew = mysqli_fetch_assoc($resultv);
			$numer = $chew['price'];

			if($numer > $numer2){

				$poisk_ost = mysqli_query($mysql, "SELECT rashod_cheli FROM `cheli` WHERE id_accounta like $User_id and name_c like'$name_c'"); 
				$sum = mysqli_query($mysql, "SELECT sum FROM `sum` WHERE id_accounta like $User_id;"); 
				$chel = mysqli_fetch_assoc($sum);
				$rashos = $chel['sum'];
		while($chels = mysqli_fetch_assoc($poisk_ost)) {
			$otv = $chels['rashod_cheli'];
			$otv2 = $otv;
			$resultam = $otv2 + $rashos;
			$mysql->query("UPDATE sum
			SET sum = '$resultam' 
			where id_accounta like '$User_id';");
		}
		$mysql->query("DELETE FROM `cheli` WHERE `id_accounta` like '$User_id';");

		$mysql->close();
		}
		else if($numer <= $numer2)
		{
		$mysql->query("DELETE FROM `cheli` WHERE `id_accounta` like '$User_id';");

		$mysql->close();
		}
		?>
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
					Успешное удаление!
				</div>
				<div class="item2">
					 <a href="chel.php">Выйти</a>
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
		$s++;
		}
	}
		if($s=1 || $s>1){?>
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
					Не найдено!
				</div>
				<div class="item2">
					 <a href="chel.php">Выйти</a>
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


?>