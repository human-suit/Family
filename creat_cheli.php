<?php

	$name_c = filter_var(trim($_POST['name_c']),
	FILTER_SANITIZE_STRING);
	$price = filter_var(trim($_POST['price']),
	FILTER_SANITIZE_STRING);

	$mysql = new mysqli('localhost','root','','bd_family');

	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($_COOKIE['user'] == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}

	$mysql->query("INSERT INTO `cheli` (`id_accounta`,`name_c`,`price`) VALUES ('$User_id','$name_c','$price')");

	$mysql->close();
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/otpravka.css">
	<title>Цели</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="menu">
				<div class="title">
					Вы успешно создали цель
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