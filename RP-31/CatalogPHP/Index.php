<?php
//подключение CSS файла
echo '<link rel="stylesheet" href="style.css">';

//подключение БД
require('connect_bd.php');
//Запрос БД на вывод всех данных
$sql = 'SELECT * FROM company';
//отправка запроса
$result = mysqli_query($dbc, $sql);
//Проверка на существование данных
if (mysqli_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr><td>'.
        'Название'.'</td><td>'.
        'Дата создания'.'</td><td>'.
        'Адрес компании'.'</td><td>'.
        'Номер телефона'.'</td><td>'.
        'Веб-сайт'.'</td><td>'.
        'Описание'.'</td><td>'.
        'Логотип'.'</td><td>'.
        'ФИО Директора'.'</td><td>'.
        'Кол-во компаний'.'</td><td>'.
        '<p id="num"></p>'.'</td></tr>';
    //Цикл для составления таблици
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        //Вывод строки
        echo '<tr><td>'.
            $row['name'].'</td><td>'.
            $row['date'].'</td><td>'.
            $row['address'].'</td><td>'.
            $row['phone'].'</td><td>'.
            $row['website'].'</td><td>'.
            $row['description'].'</td><td class="logoTD">'.
            '<img class="logo" src="'.$row['logo'].'"></td><td>'.
            $row['name_boss'].'</td><td>'.
            //Форма кнопки "Редактировать"
            '<form action="edit.php" method="post" accept-charset="UTF-8" style="margin: 0 auto">
                <input name="id" value="'.$row['id'].'" style="position: absolute; left:-9000px; opacity: 0">
                <input class="butt" type="submit" value="Редактировать">'.
            '</form>'.'</td><td>'.
            //Форма кнопки "Удалить"
            '<form action="del.php" method="post" accept-charset="UTF-8" style="margin: 0 auto">
                <input name="id" value="'.$row['id'].'" style="position: absolute; left:-9000px; opacity: 0;">
                <input class="butt" type="submit" value="Удалить">'.
            '</form>'.
            '</td></tr>';
    }
    echo '</table>';
} else {
    echo '<p>В настоящее время данных нет.</p>';
}
//Отключение БД
mysqli_close($dbc);
//Ссылка на создание своей компании
echo '<p id="aStyle"><a href="post.php">Добавить компанию</a></p>';
//Подключение Js скриптов
echo '<script src="script.js"></script>';


