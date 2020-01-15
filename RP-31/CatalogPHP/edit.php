<?php
//подключение CSS файла
echo '<link rel="stylesheet" href="style.css">';
//Подключение БД
require('connect_bd.php');
//Создание запроса
$sql = 'SELECT * FROM company WHERE id = '.$_POST['id'].';';
$id = $_POST['id'];
// Отправка запроса БД
$result = mysqli_query($dbc, $sql);
//Запись данных БД в ассациативный массив
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//Форма редактирование данных
echo '<form action="process.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data"> 
<p>Название: <input name="name" type="text" value="'.$row['name'].'"></p>
<p>Дата создания: <input name="date" type="date" value="'.$row['date'].'"></p>
<p>Адрес: <input name="address" type="text" size="64" value="'.$row['address'].'"></p>
<p>Номер: <input name="phone" type="text" size="20" value="'.$row['phone'].'"></p>
<p>Адрес сайта: <input name="website" type="text" size="64" value="'.$row['website'].'"></p>
<p>Описание:<br>
<textarea name="description" rows="5" cols="50">'.$row['description'].'
</textarea></p>
<p>Изображение: <input type="url" name="logo" size="64" value="'.$row['logo'].'"/></p>
<p>ФИО Директора: <input name="name_boss" type="text" size="64" value="'.$row['name_boss'].'"></p>
<p><input type="submit" value="Сохранить"></p>
<input name="id" value="'.$id.'" style="position: absolute; left:9000px;">
</form>';