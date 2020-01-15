<?php
//Подключение БД
require('../connect_bd.php');
//Заголовок
echo '<title>Создание контракта</title>';
//Подключение CSS
echo '<link rel="stylesheet" href="../style.css">';
//Форма создание договора
echo '<div><form action="../process/process.php" method="post" accept-charset="UTF-8">
<p>';
//отправка запроса БД
$result = mysqli_query($dbc, 'SELECT * FROM auto, model where auto.ID = model.ID');
if (mysqli_num_rows($result) > 0) {
    //Вывод списка машин
    echo '<select class="form-control" name="marka">'.
        '<option value="Выберите автомобиль" selected="" disabled="">Выберите автомобиль</option>';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<option value="'.$row['ID'].'">'.$row['Марка'].' '.$row['Модель'].'</option>';
    }
    echo '</select></p>';
} else {
    echo '<p>В настоящее время машин нет.</p>';
}
echo '<p>Дата начала действия договора: <input name="date" type="date"></p>
<p>Срок действия аренды: <input name="number" type="number" min="1" max="30" step="1"></p>
<p><input id="butt" type="submit" value="Отправить"></p>
</form></div>';
//Кнопка перехода на главную
echo '<p id="buttt">
<a  href="../index.php">Список автомобилей</a></p>';
