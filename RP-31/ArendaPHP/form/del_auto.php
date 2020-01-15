<?
//Подключение БД
require('../connect_bd.php');
//Проверка на отсутсвие метода $_POST
if (empty($_POST)) {
    //Подключение CSS
    echo '<link rel="stylesheet" href="../style.css">';
    //Форма выбора авто
    echo '<div><form action="del_auto.php" method="post" accept-charset="UTF-8"><p>';
    $result = mysqli_query($dbc, 'SELECT * FROM auto, model where auto.ID = model.ID');
    if (mysqli_num_rows($result) > 0) {
        echo '<select class="form-control" name="marka">' .
            '<option value="Выберите автомобиль" selected="" disabled="">Выберите автомобиль</option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<option value="' . $row['ID'] . '">' . $row['Марка'] . ' ' . $row['Модель'] . '</option>';
        }
        echo '</select></p>';
    } else {
        echo '<p>В настоящее время машин нет.</p>';
    }
    //Кнопка "Удалить"
    echo '<p><input id="butt" type="submit" value="Удалить"></p>';
    echo '</form></div>';
} else {
    //Запрос на удаление
    $sql = 'DELETE FROM price WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);
    //Запрос на удаление
    $sql = 'DELETE FROM model WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);
    //Запрос на удаление
    $sql = 'DELETE FROM gearbox WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);
    //Запрос на удаление
    $sql = 'DELETE FROM color WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);
    //Запрос на удаление
    $sql = 'DELETE FROM carcass WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);
    //Запрос на удаление
    $sql = 'DELETE FROM auto WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);
    //Перессылка на главную страницу
    header('Location: ../index.php');
}