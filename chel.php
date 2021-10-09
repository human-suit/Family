<?php
	//Подключения к бд
    $mysql = new mysqli('localhost','root','','bd_family'); 
	$result = mysqli_query($mysql, "SELECT `name_c` FROM `cheli`");
	$resultc = mysqli_query($mysql, "SELECT `price` FROM `cheli`");
	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	//цикл для получения нужного аккаунта
	while ($login_s = mysqli_fetch_assoc($resulta)) { 
		if($_COOKIE['user'] == $login_s['login']){
			$User_id=$login_s['id_accounta'];
		}
	}

	//Запросы на выборку данных
		$name_s = $_COOKIE['name_c'];
	$poisk_n = mysqli_query($mysql, "SELECT name_c FROM `cheli` WHERE id_accounta like $User_id  ORDER BY `cheli`.`id_cheli` DESC"); 
	$poisk_p = mysqli_query($mysql, "SELECT price FROM `cheli` WHERE id_accounta like $User_id  ORDER BY `cheli`.`id_cheli` DESC"); 
	$poisk_i = mysqli_query($mysql, "SELECT id_cheli FROM `cheli` WHERE id_accounta like $User_id  ORDER BY `cheli`.`id_cheli` DESC");
	$poisk_id = mysqli_query($mysql, "SELECT id_accounta FROM `cheli` WHERE id_accounta like $User_id  ORDER BY `cheli`.`id_cheli` DESC");
	$poisk_ost = mysqli_query($mysql, "SELECT rashod_cheli FROM `cheli` WHERE id_accounta like $User_id  ORDER BY `cheli`.`id_cheli` DESC"); 
	$poisk_os = mysqli_query($mysql, "SELECT rashod_cheli FROM `cheli` WHERE id_accounta like $User_id  ORDER BY `cheli`.`id_cheli` DESC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/chell_m.css">
	<title>Цели</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="menu">
				<div class="logo">
					 Family
				</div>
				<div class="menu2">
				<div class="item">
					 <a href="chel.php">Цели</a>
					 <div class="palka"></div>
				</div>
				<div class="item">
					 <a href="create_doxoda.php">Доходы</a>
				</div>
				<div class="item">
					 <a href="create_rashoda.php">Расходы</a>
				</div>
				<div class="item">
					 <a href="index.php"><?=$_COOKIE['user']?></a>
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
<section id="back">
		<div class="container">
			<div class="polka">
			<div class="fon">
				<div class="grey">
				<div class="fon2"> 
				<div class="o">
					<form action="creat_cheli.php" method="post">
				<input type="text" name="name_c" id="name_c" placeholder="Наименование">
				<input type="text" name="price" id="price" placeholder="Стоимость">
				<button type="submit">Создать</button>
					</form>
						</div>
					<div>
						</div>
				</div>
			</div>
			<div class="grey">
				<div class="fon2"> 
				<div class="p">
					<form action="delete.php" method="post">
				<input type="text" name="name_c" id="name_c" placeholder="Наименование">
				<button class="delete" type="submit">Удалить</button>
					</form>
						</div>
					<div>
						</div>
				</div>
			</div>
			<h1>Цели</h1>
				<div class="shcaf">
					<div class="pol">
						<h2>Наименование</h2>
						<?php
							while($name_chel = mysqli_fetch_assoc($poisk_n)) {
						?>
							<h3><?php echo $name_chel['name_c']; ?></h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
					<h3>Cтоимость</h3>
						<?php
							while($pricr_chel = mysqli_fetch_assoc($poisk_p)) {
						?>
							<h3><?php echo $pricr_chel['price']; ?></h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Прогресс</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_ost)) {

						?>
							<progress value="<?php 
					$otv = $chels['rashod_cheli'];
					$poi = mysqli_query($mysql, "SELECT price FROM `cheli` WHERE id_accounta like $User_id and `rashod_cheli` like '$otv'"); 
					$humber2 = mysqli_fetch_assoc($poi);
					$resultam = $otv / $humber2['price'] * 100;
					echo($resultam);
				 ?>" max="100"></progress>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Остаток</h3>
						<?php
							while($chel = mysqli_fetch_assoc($poisk_os)) {
						?>
							<h3><?php 
						$otv = $chel['rashod_cheli'];
						$poi = mysqli_query($mysql, "SELECT price FROM `cheli` WHERE id_accounta like $User_id and `rashod_cheli` like '$otv'"); 
						$humber2 = mysqli_fetch_assoc($poi);
						if($otv >= $humber2['price']){
							echo("Выполнено!");
						}
						elseif($otv < $humber2['price']) {
							$resultam =$humber2['price'] - $otv ;
							echo($resultam);
						}
				 ?></h3>
							<?php

							}
						?>

					</div>
				</div>
			</div>

						</div>
					</div>
				</div>
			</section>
</body>
</html>