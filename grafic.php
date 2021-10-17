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
						
					</div>
					<div class="pol">
						<h3>Работа</h3>
						
					</div>
					<div class="pol">
						<h3>Акции</h3>
						
					</div>
					<div class="pol">
						<h3>Премия</h3>
						
					</div>
					<div class="pol">
						<h3>Подработка</h3>
						
					</div>
					<div class="pol">
						<h3>Пособие</h3>
						
					</div>
					<div class="pol">
						<h3>Степендия</h3>
						
					</div>
					<div class="pol">
						<h3>Доп-доход</h3>
						
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
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grafx.css">
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
							<form action="grafu.php" method="post">
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
						<h2>Расход</h2>
						
					</div>
					<div class="pol">
						<h3>Продукты</h3>
						
					</div>
					<div class="pol">
						<h3>Здоровье</h3>
						
					</div>
					<div class="pol">
						<h3>Вещи</h3>
						
					</div>
					<div class="pol">
						<h3>Транспорт</h3>
						
					</div>
					<div class="pol">
						<h3>Развлечения</h3>
						
					</div>
					<div class="pol">
						<h3>Рестораны</h3>
						
					</div>
					<div class="pol">
						<h3>Прочее</h3>
						
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
}
?>