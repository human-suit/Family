<?php
	$dox_ras = filter_var(trim($_POST['dox_ras']),
	FILTER_SANITIZE_STRING);
	$mysql = new mysqli('localhost','root','','bd_family');
	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	while ($login_s = mysqli_fetch_assoc($resulta)) {
		if($_COOKIE['user'] == $login_s['login']){
			$User_id=$login_s['id_accounta'];
		}
	}

	if ($dox_ras == "Доход") {
	$poisk_n = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Работа';");
	$poisk_w = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Акции';");
	$poisk_e = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Премия';");
	$poisk_t = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Подработка';");
	$poisk_y = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Пособие';");
	$poisk_u = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Степендия';");
	$poisk_i = mysqli_query($mysql, "SELECT price FROM `spiski` WHERE id_accounta like $User_id and name_type_s like'Доп-доход';");

	$poisk_sas = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_sasa = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_sasas = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_sasasa = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_s = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_sa = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_su = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");
	$poisk_si = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and type_s like'Доход';");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grafic.css">
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
					 <a href="index.php"><?=$_COOKIE['user']?></a>
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
							<button type="submit">Назад</button>
							</form>
						</div>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Доход</h2>
						<?php
							while($name_chel = mysqli_fetch_assoc($poisk_sas)) {
						?>
							<h3><?php echo $name_chel['user_sum']; ?></h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Работа</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_n)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_sasa);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100 +1;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Акции</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_w)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_sasas);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Премия</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_e)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_sasasa);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Подработка</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_t)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_s);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Пособие</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_y)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_sa);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Степендия</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_u)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_su);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Доп-доход</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_i)) {

						?>
							<h3><?php 
					$otv = $chels['price'];
					$name_che = mysqli_fetch_assoc($poisk_si);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					echo($resultam);
				 ?> %</h3>
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
<?php
exit();
}
else if($dox_ras =="Расход"){

}