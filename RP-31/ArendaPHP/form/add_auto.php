<?php
//Подключение CSS
echo '<link rel="stylesheet" href="../style.css">';
//Форма добавления авто
echo '<div><form action="../process/process_auto.php" method="post" accept-charset="UTF-8">
<p>Марка:<input name="mark" type="text"></p>
<p>Модель: <input name="model" type="text"></p>
<p>Рег. номер: <input name="R_number" type="text"></p>
<p>Тип кузова: <input name="carcass" type="text"></p>
<p>Цвет: <input name="color" type="text"></p>
<p>КПП: <input name="gearbox" type="text"></p>
<p>Цена за день: <input name="price" type="text"></p>
<p><input id="butt" type="submit" value="Добавить"></p>
</form></div>';