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

	$poisk_n = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE id_accounta like $User_id ORDER BY `spiski`.`id_spiska` DESC");

	$poisk_p = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id ORDER BY `spiski`.`id_spiska` DESC");
	$poisk_i = mysqli_query($mysql, "SELECT date_S FROM `spiski` WHERE id_accounta like $User_id ORDER BY `spiski`.`id_spiska` DESC");
	$poisk_t = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE id_accounta like $User_id ORDER BY `spiski`.`id_spiska` DESC");
	$poisk_ty = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE id_accounta like $User_id ORDER BY `spiski`.`id_spiska` DESC");
	$poisk_cheli = mysqli_query($mysql, "SELECT name_c FROM `cheli` WHERE id_accounta like $User_id ORDER BY `cheli`.`id_cheli` DESC");
	$poisk_chel = mysqli_query($mysql, "SELECT name_c FROM `cheli` WHERE id_accounta like $User_id ORDER BY `cheli`.`id_cheli` DESC");
	$poisk_os = mysqli_query($mysql, "SELECT sum FROM `sum` WHERE id_accounta like $User_id");
	$naxod_sum = mysqli_query($mysql, "SELECT SUM(price) AS user_ras FROM `spiski` WHERE id_accounta like $User_id AND type_s LIKE'Расход'  ");

	while($chels = mysqli_fetch_assoc($poisk_os)) {
		$sum=$chels['sum'];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/indexx.css">
	<title>Family</title>
	<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
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
					 <a href="create_rashoda.php">Расходы</a>
				</div>
				<div class="item">
					 <a href="#"><?=$_COOKIE['user']?></a>
					 <div class="palka"></div>
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
	<section class="foter_8">
		<div class="container">
			<div class="list">
				<div class="grey">
					<div class="main_poizk">
						<div>
							<form action="poizk_spiska_s.php" method="post">
							<select class="sectw" name="select_type_v">
    						<option selected value="name_kto">Кто</option>
    						<option value="type_s">Тип</option>
    						<option value="price">Сколько</option>
    						<option value="date_s">Дата</option>
    						<option value="name_type_s">Наименование типа</option>
   						</select>
							<input type="name_name" name="name_name" id="name_name" placeholder="Наименование">
							<button type="submit">Поиск</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($name_chel = mysqli_fetch_assoc($poisk_n)) {
						?>
							<h3><?php echo $name_chel['name_kto']; ?></h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($type_sp = mysqli_fetch_assoc($poisk_t)) {
						?>
							<h3><?php echo $type_sp['type_s']; ?></h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
					<h2>Сколько</h2>
						<?php
							while($pricr_chel = mysqli_fetch_assoc($poisk_p)) {
						?>
							<h3><?php echo $pricr_chel['price']; ?> руб</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($kol = mysqli_fetch_assoc($poisk_i)) {
						?>
						<h3><?php echo $kol['date_S']; ?></h3>
							
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($name_type = mysqli_fetch_assoc($poisk_ty)) {
						?>
							<h3><?php echo $name_type['name_type_s']; ?></h3>
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