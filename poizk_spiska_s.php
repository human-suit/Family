<?php

	$select_type_v = filter_var(trim($_POST['select_type_v']),
	FILTER_SANITIZE_STRING);

	$mesac = filter_var(trim($_POST['mesac']),
	FILTER_SANITIZE_STRING);
	$name_name = filter_var(trim($_POST['name_name']),
	FILTER_SANITIZE_STRING);

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
	if($mesac != "Месяцы"){
		$poisk_date = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE `id_accounta` LIKE $User_id AND month(date_s) LIKE '$mesac' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_dat = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND month(date_s) LIKE '$mesac' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_da = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE `id_accounta` LIKE $User_id AND month(date_s) LIKE '$mesac' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_d = mysqli_query($mysql, "SELECT date_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND month(date_s) LIKE '$mesac' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND month(date_s) LIKE '$mesac' ORDER BY `spiski`.`id_spiska` DESC");
						
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
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
							<form action="index.php">
							<button type="submit">Обновить</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_date)) {
						?>
							<h3><?php echo $chels['name_kto']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_dat)) {
						?>
							<h3><?php echo $chels['type_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Сколько</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_da)) {
						?>
							<h3><?php echo $chels['price']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_d)) {
						?>
							<h3><?php echo $chels['date_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk)) {
						?>
							<h3><?php echo $chels['name_type_s']; ?></h3>
							<?php

								}
						?>

					</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>
<?php
exit();
	}
	?>
	<?php
	if($select_type_v == "type_s"){
		$poisk_date = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE `id_accounta` LIKE $User_id AND type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_dat = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_da = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE `id_accounta` LIKE $User_id AND type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_d = mysqli_query($mysql, "SELECT date_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
						
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
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
							<form action="index.php">
							<button type="submit">Обновить</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_date)) {
						?>
							<h3><?php echo $chels['name_kto']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_dat)) {
						?>
							<h3><?php echo $chels['type_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Сколько</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_da)) {
						?>
							<h3><?php echo $chels['price']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_d)) {
						?>
							<h3><?php echo $chels['date_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk)) {
						?>
							<h3><?php echo $chels['name_type_s']; ?></h3>
							<?php

								}
						?>

					</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>
<?php
		exit();
	}
	else if($select_type_v == "date_s"){
			$poisk_date = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE `id_accounta` LIKE $User_id AND date_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_dat = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND date_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_da = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE `id_accounta` LIKE $User_id AND date_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_d = mysqli_query($mysql, "SELECT date_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND date_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND date_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
						
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
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
							<form action="index.php">
							<button type="submit">Обновить</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_date)) {
						?>
							<h3><?php echo $chels['name_kto']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_dat)) {
						?>
							<h3><?php echo $chels['type_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Сколько</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_da)) {
						?>
							<h3><?php echo $chels['price']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_d)) {
						?>
							<h3><?php echo $chels['date_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk)) {
						?>
							<h3><?php echo $chels['name_type_s']; ?></h3>
							<?php

								}
						?>

					</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>
<?php
	exit();
	}

	else if($select_type_v == "price"){
		$poisk_date = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE `id_accounta` LIKE $User_id AND price LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_dat = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND price LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_da = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE `id_accounta` LIKE $User_id AND price LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_d = mysqli_query($mysql, "SELECT date_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND price LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND price LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
						
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
							<form action="index.php">
							<button type="submit">Обновить</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_date)) {
						?>
							<h3><?php echo $chels['name_kto']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_dat)) {
						?>
							<h3><?php echo $chels['type_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Сколько</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_da)) {
						?>
							<h3><?php echo $chels['price']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_d)) {
						?>
							<h3><?php echo $chels['date_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk)) {
						?>
							<h3><?php echo $chels['name_type_s']; ?></h3>
							<?php

								}
						?>

					</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>
<?php
		exit();
	}
		else if($select_type_v == "name_type_s"){
		$poisk_date = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_dat = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_da = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_d = mysqli_query($mysql, "SELECT date_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_type_s LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
						
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
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
							<form action="index.php">
							<button type="submit">Обновить</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_date)) {
						?>
							<h3><?php echo $chels['name_kto']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_dat)) {
						?>
							<h3><?php echo $chels['type_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Сколько</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_da)) {
						?>
							<h3><?php echo $chels['price']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_d)) {
						?>
							<h3><?php echo $chels['date_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk)) {
						?>
							<h3><?php echo $chels['name_type_s']; ?></h3>
							<?php

								}
						?>

					</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>
<?php
		exit();
	}
	else if($select_type_v == "name_kto"){
		$poisk_date = mysqli_query($mysql, "SELECT name_kto FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_kto LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_dat = mysqli_query($mysql, "SELECT type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_kto LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_da = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_kto LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk_d = mysqli_query($mysql, "SELECT date_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_kto LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
		$poisk = mysqli_query($mysql, "SELECT name_type_s FROM `spiski` WHERE `id_accounta` LIKE $User_id AND name_kto LIKE '$name_name' ORDER BY `spiski`.`id_spiska` DESC");
						
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
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
							<form action="index.php">
							<button type="submit">Обновить</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Кто</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_date)) {
						?>
							<h3><?php echo $chels['name_kto']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Тип</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_dat)) {
						?>
							<h3><?php echo $chels['type_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Сколько</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_da)) {
						?>
							<h3><?php echo $chels['price']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Дата</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_d)) {
						?>
							<h3><?php echo $chels['date_s']; ?></h3>
							<?php

								}
						?>

					</div>
					<div class="pol">
						<h2>Наименование типа</h2>
						<?php
							while($chels = mysqli_fetch_assoc($poisk)) {
						?>
							<h3><?php echo $chels['name_type_s']; ?></h3>
							<?php

								}
						?>

					</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>
<?php
		exit();
	}