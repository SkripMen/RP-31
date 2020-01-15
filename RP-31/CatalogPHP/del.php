<?php
//подключение CSS файла
echo '<link rel="stylesheet" href="style.css">';
//подключение БД
require('connect_bd.php');
//Создание запроса
$sql = 'DELETE FROM company WHERE id = '.$_POST['id'].';';
//Отправка запроса БД
$result = mysqli_query($dbc, $sql);
//Переадресация на Главную
exit("<meta http-equiv='refresh' content='0; url= Index.php'>");