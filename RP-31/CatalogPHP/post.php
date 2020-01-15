<?php
//подключение CSS файла
//echo '<link rel="stylesheet" href="style.css">';
//Форма создания компании
echo '<form action="process.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data"> 
<p>Название: <input name="name" type="text"></p>
<p>Дата создания: <input name="date" type="date"></p>
<p>Адрес: <input name="address" type="text" size="64"></p>
<p>Номер: <input name="phone" type="text" size="20"></p>
<p>Адрес сайта: <input name="website" type="text" size="64"></p>
<p>Описание:<br>
<textarea name="description" rows="5" cols="50">
</textarea></p>
<p>Изображение: <input type="url" name="logo" size="64"/></p>
<p>ФИО Директора: <input name="name_boss" type="text" size="64"></p>
<p><input type="submit" value="Отправить"></p>
</form>';
//Ссылка на список
echo '<p><a href="Index.php">Вернуться к списку</a></p>';