
var x = 0;
function addInputR() {
	if (x < 10) {
    var str = '<div class="fle"> <input class="my" type="text"> <select class="sectw" 	="select">'+
    	'<option selected value="s1">Продукты</option>'+
    		'<option value="s2">ЖКХ</option>'+
    		'<option value="s3">Транспорт</option>'+
    	'<option value="s4">Проезд</option>'+
    	'<option value="s5">Покупки</option>'+
   '</select>'+
    '<select class="sectw" name="select">'+
      '<option selected value="s1">Папа</option>'+
        '<option value="s2">Мама</option>'+
        '<option value="s3">Сын</option>'+
      '<option value="s4">Дочь</option>'+
   '</select>'+
    '</div> <div id="rachod' + (x + 1) + '"></div>';
    document.getElementById('rachod' + x).innerHTML = str;
    x++;
  } else
  {
  	alert('STOP it!');
  }
}

var y = 0;
function addInputD() {
	if (y < 10) {
    var str = '<div class="fle">'+
    '<select class="sectw" name="select">'+
      '<option selected value="s1">Папа</option>'+
        '<option value="s2">Мама</option>'+
        '<option value="s3">Сын</option>'+
      '<option value="s4">Дочь</option>'+
   '</select>'+
    '<select class="sectw" name="select">'+
    	'<option selected value="s1">Работа</option>'+
    		'<option value="s2">Акции</option>'+
    		'<option value="s3">Премия</option>'+
    	'<option value="s4">Подработка</option>'+
    	'<option value="s5">Пособие</option>'+
    	'<option value="s6">Степендия</option>'+
    	'<option value="s7">Доп-доход</option>'+
   '</select> <input type="text"> </div> <div id="doxod' + (y + 1) + '"></div>';
    document.getElementById('doxod' + y).innerHTML = str;
    y++;
  } else
  {
  	alert('STOP it!');
  }
}
