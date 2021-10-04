<?php
	
	$mysql = new mysqli('localhost','root','','bd_family');

	$resulta = mysqli_query($mysql, "SELECT * FROM `cheli`");

	$name_c = filter_var(trim($_POST['name_c']),
	FILTER_SANITIZE_STRING);

	if (mb_strlen($name_c) < 1 || mb_strlen($name_c) > 90) {
		echo "Недопустимая длина";
		exit();
	}	

	$resulta = mysqli_query($mysql, "SELECT * FROM `accounts`");

	$result= mysqli_query($mysql, "SELECT * FROM `cheli`");

while ($login_s = mysqli_fetch_assoc($resulta)) {
	if($_COOKIE['user'] == $login_s['login']){
		$User_id=$login_s['id_accounta'];
	}
}
$s=0;
while ($name_cheli = mysqli_fetch_assoc($result)) {
	if($name_c == $name_cheli['name_c']){
		$chel_id=$name_cheli['id_cheli'];
		$mysql->query("DELETE FROM `cheli` WHERE `cheli`.`id_cheli` = '$chel_id';");

		$mysql->close();
		header("location: /");
		exit();
	}
	else{
		$s++;
	}
}
	if($s=1 || $s>1){
		echo "Наименование не существует!";
		exit();
	}


?>