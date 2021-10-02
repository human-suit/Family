<?php
	$mysql = new mysqli('localhost','root','','bd_family');
	
	$result = mysqli_query($mysql, "SELECT `name_kto` FROM `spiski`");
	
	$resultc = mysqli_query($mysql, "SELECT `price` FROM `spiski`");

	$resultd = mysqli_query($mysql, "SELECT `date_s` FROM `spiski`");

	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($_COOKIE['user'] == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}

	$poisk_n = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE id_accounta like $User_id ");

	$poisk_p = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id ");
	$poisk_i = mysqli_query($mysql, "SELECT date_S FROM `spiski` WHERE id_accounta like $User_id ");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/creatcheli.css">
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
				<h1>Доходы</h1>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($name_chel = mysqli_fetch_assoc($poisk_n)) {
						?>
							<h2><?php echo $name_chel['name_kto']; ?></h2>
							<?php

							}
						?>
					</div>
					<div class="pol">
					<h3>Сколько</h3>
						<?php
							while($pricr_chel = mysqli_fetch_assoc($poisk_p)) {
						?>
							<h3><?php echo $pricr_chel['price']; ?></h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Дата</h3>
						<?php
							while($kol = mysqli_fetch_assoc($poisk_i)) {
						?>
						<h2><?php echo $kol['date_S']; ?></h2>
							
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
				<h2>Создание дохода</h2>
				<select class="sectw" name="select">
    						<option selected value="s1">Папа</option>
    						<option value="s2">Мама</option>
    						<option value="s3">Сын</option>
    						<option value="s4">Дочь</option>
   						</select>
				<input type="text" name="price" id="price" placeholder="Стоимость">
				<input type="date" name="date_k" id="date_k" placeholder="Дата">
				<select class="sectw" name="select">
    						<option selected value="s1">Работа</option>
    						<option value="s2">Акции</option>
    						<option value="s3">Премия</option>
    						<option value="s4">Подработка</option>
    						<option value="s5">Пособие</option>
    						<option value="s6">Степендия</option>
    						<option value="s7">Доп-доход</option>
   				</select>

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