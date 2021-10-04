<?php
	$mysql = new mysqli('localhost','root','','bd_family');
	
	$result = mysqli_query($mysql, "SELECT `name_c` FROM `cheli`");
	
	$resultc = mysqli_query($mysql, "SELECT `price` FROM `cheli`");

	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($_COOKIE['user'] == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}

	$poisk_n = mysqli_query($mysql, "SELECT name_c FROM `cheli` WHERE id_accounta like $User_id ");

	$poisk_p = mysqli_query($mysql, "SELECT price FROM `cheli` WHERE id_accounta like $User_id ");
	$poisk_i = mysqli_query($mysql, "SELECT id_cheli FROM `cheli` WHERE id_accounta like $User_id ");
	$poisk_id = mysqli_query($mysql, "SELECT id_accounta FROM `cheli` WHERE id_accounta like $User_id ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/creat_cheli.css">
	<title>Доход</title>
</head>
<body>
	<header class="menu">
	<div class="container">
		<div>
				<div class="menu_con">
						<div class="polka">
							<p><?=$_COOKIE['user']?></p>
							<a href="#" class="link fab fa-vk"></a>
							<a href="#" class="link fab fa-instagram"></a>
							<a href="#" class="link fab fa-facebook-square"></a>
							<a href="index.php">Назад</a>
						</div>
				</div>
		</div>
	</div>
</header>
<section id="back">
		<div class="container">
			<div class="polka">
			<div class="fon">
				<h1>Цели</h1>
				<div class="shcaf">
					<div class="pol">
						<h2>Наименование</h2>
						<?php
							while($name_chel = mysqli_fetch_assoc($poisk_n)) {
						?>
							<h2><?php echo $name_chel['name_c']; ?></h2>
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
							while($kol = mysqli_fetch_assoc($poisk_i)) {
						?>
							<progress value="0" max="100"></progress>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Остаток</h3>
						<?php
							while($kola = mysqli_fetch_assoc($poisk_id)) {
						?>
							<h3>0</h3>
							<?php

							}
						?>

					</div>
				</div>
			</div>
			<div>
			<div class="fon2"> 
				<div>
					<form action="php/creat_cheli.php" method="post">
				<h2>Создание цели</h2>
				<input type="text" name="name_c" id="name_c" placeholder="Наименование">
				<input type="text" name="price" id="price" placeholder="Стоимость">
				<button type="submit">Создать</button>
					</form>
						</div>
						</div>
			<div class="fon3"> 
				<div>
					<form action="php/delete.php" method="post">
				<h2>Удаление</h2>
				<input type="text" name="name_c" id="name_c" placeholder="Наименование">
				<button type="submit">Удалить</button>
					</form>
						</div>
						</div>
						</div>
					</div>
				</div>
			</section>
	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>
</body>
</html>