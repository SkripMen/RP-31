<?php
//подключение CSS файла
echo '<link rel="stylesheet" href="style.css">';
//Подключение БД
require('connect_bd.php');
//Функция если выдачи ошибки при отсутвии каких-либо данных
function fail($str)
{
    echo "<p>Пожалуйста, укажите $str.</p>";
    echo "<p><a href='post.php'>Написать сообщение</a></p>";
    exit();
}
//Проверка на редактирование
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql = 'DELETE FROM company WHERE id = ' . $_POST['id'] . ';';
    $result = mysqli_query($dbc, $sql);
}
//Проверка заполнения графы "Название"
if (!empty(trim($_POST['name']))) {
    $name = addslashes($_POST['name']);
} else {
    fail('название');
}
//Проверка заполнения графы "дата создания"
if (!empty(trim($_POST['date']))) {
    $date = $_POST['date'];
} else {
    fail('дату создания');
}
//Проверка заполнения графы "адрес"
if (!empty(trim($_POST['address']))) {
    $address = addslashes($_POST['address']);
} else {
    fail('адрес офиса');
}
//Проверка заполнения графы "номер телефона"
if (!empty(trim($_POST['phone']))) {
    $phone = addslashes($_POST['phone']);
} else {
    fail('номер компании');
}

//Проверка заполнения графы "адрес сайта"
if (!empty(trim($_POST['website']))) {
    $website = addslashes($_POST['website']);
} else {
    fail('адрес сайта');
}
//Проверка заполнения графы "описание"
if (!empty(trim($_POST['description']))) {
    $description = addslashes(trim($_POST['description']));
} else {
    fail('описание');
}
//Проверка заполнения графы "лого"
if (!empty(trim($_POST['logo']))) {
    $logo = addslashes(trim($_POST['logo']));
} else {
    fail('логотип');
}

//Проверка заполнения графы "ФИО Директора"
if (!empty(trim($_POST['name_boss']))) {
    $name_boss = addslashes($_POST['name_boss']);
} else {
    fail('ФИО Директора');
}
//Составляем запрос на БД
$sql = "INSERT INTO company (
                        name,
                        date, 
                        address, 
                        phone,
                        website,
                        description,
                        logo,
                        name_boss) 
                    VALUES(
                        '$name',
                        '$date',
                        '$address',
                        '$phone',
                        '$website',
                        '$description',
                        '$logo',
                        '$name_boss')";
//Отпровляем запрос БД
$result = mysqli_query($dbc, $sql);
//Проверка на ошибку БД
if (mysqli_affected_rows($dbc) != 1) {
    echo '<p>Ошибка</p>' . mysqli_error($dbc);
    mysqli_close($dbc);
} else {
    mysqli_close($dbc);
//Переадресация на главную страницу
    exit("<meta http-equiv='refresh' content='0; url= Index.php'>");
}
?>