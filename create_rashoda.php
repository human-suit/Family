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

	$poisk_n = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE 'Расход'");

	$poisk_t = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE 'Расход'");

	$poisk_p = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE'Расход'");

	$poisk_i = mysqli_query($mysql, "SELECT date_S FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE 'Расход'");

	$poisk_tn = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE 'Расход'");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/doxod_s.css">
	<title>Расходы</title>
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
				</div>
				<div class="item">
					 <a href="create_doxoda.php">Доходы</a>
				</div>
				<div class="item">
					 <a href="#">Расходы</a>
					 <div class="palka"></div>
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
					<form action="create_rashoda_p.php" method="post">
					<select class="sectw" name="select_kto">
    						<option selected value="Папа">Папа</option>
    						<option value="Мама">Мама</option>
    						<option value="Сын">Сын</option>
    						<option value="Дочь">Дочь</option>
   						</select>
				<input type="text" name="price" id="price" placeholder="Стоимость">
				<input type="date" name="date_k" id="date_k" placeholder="Дата">
				<select class="sectw" name="select_type">
    						<option selected value="Продукты">Продукты</option>
    						<option value="Здоровье">Здоровье</option>
    						<option value="Вещи">Вещи</option>
    						<option value="Транспорт">Транспорт</option>
    						<option value="Развлечения">Развлечения</option>
    						<option value="Рестораны">Рестораны</option>
    						<option value="Прочее">Прочее</option>
   				</select>
				<button type="submit">Создать</button>
					</form>
				<form action="php/delete.php" method="post">
				<button class="delete" type="submit">Удалить</button>
					</form>
						</div>
					<div>
						</div>
				</div>
			</div>
			
			<h1>Расходы</h1>
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
					<h3>Тип</h3>
						<?php
							while($name_type = mysqli_fetch_assoc($poisk_t)) {
						?>
							<h2><?php echo $name_type['type_s']; ?></h2>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Сколько</h3>
						<?php
							while($pricr_chel = mysqli_fetch_assoc($poisk_p)) {
						?>
							<h3><?php echo $pricr_chel['price']; ?> руб</h3>
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
					<div class="pol">
						<h3>Имя типа</h3>
						<?php
							while($name_type_t = mysqli_fetch_assoc($poisk_tn)) {
						?>
							<h2><?php echo $name_type_t[name_type_s]; ?></h2>
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