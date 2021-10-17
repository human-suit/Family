<?php
	$mesac = filter_var(trim($_POST['mesac']),
	FILTER_SANITIZE_STRING);
	$mysql = new mysqli('localhost','root','','bd_family');
	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	while ($login_s = mysqli_fetch_assoc($resulta)) {
		if($_COOKIE['user'] == $login_s['login']){
			$User_id=$login_s['id_accounta'];
		}
	}
	$poisk_n = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s like'Работа'");
	$poisk_w = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s  like'Акции';");
	$poisk_e = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s  like'Премия';");
	$poisk_t = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s  like'Подработка';");
	$poisk_y = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s  like'Пособие';");
	$poisk_u = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s  like'Степендия';");
	$poisk_i = mysqli_query($mysql, "SELECT price, SUM(price) AS user_s FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and name_type_s  like'Доп-доход';");

	$poisk_sas = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");
	$poisk_sasa = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s  like'Доход';");
	$poisk_sasas = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");
	$poisk_sasasa = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");
	$poisk_s = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");
	$poisk_sa = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");
	$poisk_su = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");
	$poisk_si = mysqli_query($mysql, "SELECT price, SUM(price) AS user_sum FROM `spiski` WHERE id_accounta like $User_id and month(date_s) like $mesac and type_s like'Доход';");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/graf.css">
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
							<form action="graf.php" method="post">
								<select class="sectw" name="mesac">
    						<option selected value="Месяц">Месяц</option>
    						<option value="1">Январь</option>
    						<option value="2">Февраль</option>
    						<option value="3">Март</option>
    						<option value="4">Апрель</option>
    						<option value="5">Май</option>
    						<option value="6">Июнь</option>
    						<option value="7">Июль</option>
    						<option value="8">Август</option>
    						<option value="9">Сентябрь</option>
    						<option value="10">Октябрь</option>
    						<option value="11">Ноябрь</option>
    						<option value="12">Декабрь</option>
   						</select>
							<button type="submit">Поиск</button>
							</form>
							<form action="index.php">
							<button type="submit">Назад</button>
							</form>
					</div>
				</div>
				<div>
				<div class="shcaf">
					<div class="pol">
						<h2>Доход</h2>
						<?php
							while($name_chel = mysqli_fetch_assoc($poisk_sas)) {
								if(is_null($name_chel['user_sum'])){
									$resultam = 0;
									$m=$resultam;
									?><h3><?php echo($resultam); ?></h3> <?php
								}	
								else{
										?>
							<h3><?php 
							$m=1; 
							echo $name_chel['user_sum']; 
							?></h3>
							<?php
							}
						}
						?>
					</div>
					<div class="pol">
						<h3>Работа</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_n)) {

						?>
							<h3><?php 
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$a=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_sasa);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100 +1;
					$resultam = $resultam %	100;
					$a=$resultam;
					echo($resultam);
				}
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
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$b=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_sasas);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					$b=$resultam;
					echo($resultam);
				}	
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
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$c=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_sasasa);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					$c=$resultam;
					echo($resultam);
					}
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
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$d=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_s);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					$d=$resultam;
					echo($resultam);
				}
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
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$i=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_sa);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					$i=$resultam;
					echo($resultam);
				}
				 ?> %</h3>
							<?php

							}
						?>
					</div>
					<div class="pol">
						<h3>Стипендия</h3>
						<?php
							while($chels = mysqli_fetch_assoc($poisk_u)) {

						?>
							<h3><?php 
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$f=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_su);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					$f=$resultam;
					echo($resultam);
				}
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
					$otv = $chels['user_s'];
					if(is_null($otv)){
					$resultam = 0;
					$g=$resultam;
					echo($resultam);
					}
					else{
					$name_che = mysqli_fetch_assoc($poisk_si);
					$humber2 = $name_che['user_sum'];
					$resultam = $otv / $humber2 * 100;
					$resultam = $resultam %	100;
					$g=$resultam;
					echo($resultam);
				}
				 ?> %</h3>
							<?php

							}
						?>
					</div>
				</div>
				<style type="text/css">
					.grav{
						<?php
							if($m == 0){
								?>height: 0px;<?php
							}
							else if($m==1){?>
								height: 200px;
							<?php }
						?>
						margin-left: 60px;
						width: 30px;
						background: blue;
					}
					.grave{
						margin-left: 80px;
						<?php
							if($a == 100){
								?>height: 200px;<?php
							}
							else if($a >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($a >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($a >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($a >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($a >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($a >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($a >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($a >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($a >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($a >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($a > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($a == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
					.grave2{
						margin-left: 80px;
						<?php
							if($b == 100){
								?>height: 200px;<?php
							}
							else if($b >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($b >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($b >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($b >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($b >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($b >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($b >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($b >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($b >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($b >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($b > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($b == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
					.grave3{
						margin-left: 80px;
						<?php
							if($c == 100){
								?>height: 200px;<?php
							}
							else if($c >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($c >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($c >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($c >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($c >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($c >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($c >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($c >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($c >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($c >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($c > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($c == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
					.grave4{
						margin-left: 80px;
						<?php
							if($d == 100){
								?>height: 200px;<?php
							}
							else if($d >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($d >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($d >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($d >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($d >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($d >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($d >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($d >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($d >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($d >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($d > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($d == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
					.grave5{
						margin-left: 150px;
						<?php
							if($i == 100){
								?>height: 200px;<?php
							}
							else if($i >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($i >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($i >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($i >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($i >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($i >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($i >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($i >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($i >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($i >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($i > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($i == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
					.grave6{
						margin-left: 100px;
						<?php
							if($f == 100){
								?>height: 200px;<?php
							}
							else if($f >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($f >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($f >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($f >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($f >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($f >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($f >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($f >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($f >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($f >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($f > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($f == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
					.grave7{
						margin-left: 120px;
						<?php
							if($g == 100){
								?>height: 200px;<?php
							}
							else if($g >= 90){
								?>height: 180px;
								margin-top: 20px;<?php
							}
							else if($g >= 80){
								?>height: 165px;
								margin-top: 35px;<?php
							}
							else if($g >= 70){
								?>height: 145px;
								margin-top: 55px;<?php
							}
							else if($g >= 60){
								?>height: 125px;
								margin-top: 75px;<?php
							}
							else if($g >= 50){
								?>height: 110px;
								margin-top: 90px;<?php
							}
							else if($g >= 40){
								?>height: 95px;
								margin-top: 105px;<?php
							}
							else if($g >= 30){
								?>height: 75px;
								margin-top: 125px;<?php
							}
							else if($g >= 20){
								?>height: 55px;
								margin-top: 145px;<?php
							}
							else if($g >= 10){
								?>height: 30px;
								margin-top: 170px;<?php
							}	
							else if($g >= 5){
								?>height: 15px;
								margin-top: 185px;<?php
							}
							else if($g > 0){
								?>height: 5px;
								margin-top: 195px;<?php
							}
							else if($g == 0){
								?>height: 0px;<?php
							}
		
						?>
						width: 30px;
						background: #EA7D4A;
					}
				

				</style>
				<div class="shcaf">
					<div class="grav">
						
					</div>
					<div class="grave">
						
						
					</div>
					<div class="grave2">
						
					</div>
					<div class="grave3">

						
					</div>
					<div class="grave4">
						
					</div>
					<div class="grave5">
						
					</div>
					<div class="grave6">
						
					</div>
					<div class="grave7">
						
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
		
	</section>
</body>


</html>