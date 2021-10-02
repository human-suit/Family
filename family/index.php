<?php
	 	if($_COOKIE['user'] == ''):
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
	<title>Cемейный бюджет</title>
</head>	
<body>
	 <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<header id="back" class="bg-fon">
		<div class="container">
		<div class="header1">
			<div class="polka">
				<h1>Family</h1>
			<div class="palka"></div>
				<h2>Расчет</h2>
			<div class="palka"></div>
				<h3>Выберите дату</h3>
				<input class="date_ad" type="date">
				<button class="poisk">Поиск</button>
			</div>
			<div class="back2">
				<a href="#" class="link fab fa-vk"></a>
				<div class="palka"></div>
				<a href="#" class="link fab fa-instagram"></a>
				<div class="palka"></div>
				<a href="#" class="link fab fa-facebook-square"></a>
			</div>
		</div>
	</div>
</header>

<section id="sec" class="rachet" v-if="show">
	<div class="menu3">
		<div class="bit1">
			<a href="vxod.html">Вход</a>
		</div>
			<div class="bit1">
				<a href="register.html">Регистрация</a>				
			</div>
	</div>
		<div class="container">
			<div id="main" class="main">
				<div class="polka2">
					<div id="doxod" class="doxod">	
						<h1>Доходы</h1>
							<div class="polka3">
						<select class="sectw" name="select">
    						<option selected value="s1">Папа</option>
    						<option value="s2">Мама</option>
    						<option value="s3">Сын</option>
    						<option value="s4">Дочь</option>
   						</select>
						<select class="sectw" name="select">
    						<option selected value="s1">Работа</option>
    						<option value="s2">Акции</option>
    						<option value="s3">Премия</option>
    						<option value="s4">Подработка</option>
    						<option value="s5">Пособие</option>
    						<option value="s6">Степендия</option>
    						<option value="s7">Доп-доход</option>
   						</select>
   							<input type="text" v-for="i in inp" size="40">
							</div>
					<div class="table">
						<div id="doxod0">
					
						</div>
					</div>
						<button onclick="addInputD()"  class="lan far fa-plus-square">Добавить</button>
					</div>
			<div id="rachod" class="rachod">
				<h1>Расходы</h1>
				<div class="polka3">
					<input type="text" size="40">
						<select class="bye" name="select">
    						<option selected value="s1">Продукты</option>
    						<option value="s2">ЖКХ</option>
    						<option value="s3">Транспорт</option>
    						<option value="s4">Проезд</option>
    						<option value="s4">Покупк</option>
  						</select>
   						<select class="sectw" name="select">
    						<option selected value="s1">Папа</option>
    						<option value="s2">Мама</option>
    						<option value="s3">Сын</option>
    						<option value="s4">Дочь</option>
  						</select>
				</div>
						<div class="table">
							<div id="rachod0">
					
							</div>
						</div>
						<button onclick="addInputR()"  class="lan far fa-plus-square">Добавить</button>
					</div>
				</div>
			</div>
		<div class="but_save">
			<button>Простмотр</button>	
			<button>Сохранить</button>		
		</div>
		</div>
	</section>

	<footer>
		<div class=" container">
			<div class="fo">
		<div class="box">
			<div class="foter">
				<h1>Над проектом работали:</h1>
				<p>Дизайнеры:</p>
				<p>Разработчик: Филиппов Вадим</p>
			</div>
			<div class="foter">
				<h1>Тестировщик:</h1>
				<p>Аналитик:</p>
			</div>
			<div class="foter">
				<h1>Менеджер проекта:</h1>
			</div>
		</div>
		<div class="laif">
				<a href="#">Family</a>
				<p>© 2021</p>
		</div>			
			</div>
		</div>
	</footer>
	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>
	<script src="main.js"></script>
</body>
</html>

<?php else:?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
	<title>Cемейный бюджет</title>
</head>	
<header id="back" class="bg-fon">
		<div class="container">
			<div class="header1">
				<div class="polka">
					<h1><?=$_COOKIE['user']?></h1>
				<div class="palka"></div>
					<h2>Расчет</h2>
			<div class="palka"></div>
					<h3>Выберите дату</h3>
						<input class="date_ad" type="date">
					<button class="poisk">Поиск</button>
					<a  href="chel.php">Цели</a>
			</div>
			<div class="back2">
				<a href="#" class="link fab fa-vk"></a>
				<div class="palka"></div>
				<a href="#" class="link fab fa-instagram"></a>
				<div class="palka"></div>
				<a href="#" class="link fab fa-facebook-square"></a>
			</div>
		</div>
	</div>
</header>

	<section id="sec" class="rachet" v-if="show">
	<div class="menu2">
			<div class="bit1">
				<a href="register.html">Регистрация</a>				
			</div>
		<div class="bit1">
			<a href="create_doxod.php">Доходы</a>
		</div>
		<div class="bit1">
			<a href="php/create_trat.php">Расходы</a>
		</div>
		<div class="bit1">
			<a href="php/exit.php">Выйти</a>
		</div>
	</div>
		<div class="container">
			<div id="main" class="main">
				<div class="polka2">
					<div id="doxod" class="doxod">
						<h1>Доходы</h1>
				</div>
			<div id="rachod" class="rachod">
				<h1>Расходы</h1>

		</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class=" container">
			<div class="fo">
				<div class="box">
					<div class="foter">
						<h1>Над проектом работали:</h1>
							<p>Дизайнеры:</p>
						<p>Разработчик: Филиппов Вадим</p>
					</div>
				<div class="foter">
					<h1>Тестировщик:</h1>
					<p>Аналитик:</p>
				</div>
					<div class="foter">
						<h1>Менеджер проекта:</h1>
					</div>
				</div>
				<div class="laif">
					<a href="#">Family</a>
					<p>© 2021</p>
				</div>			
			</div>
		</div>
	</footer>
	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>
	<script src="main.js"></script>
</body>
</html>
<?php endif;?>