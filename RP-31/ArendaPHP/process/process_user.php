<?php
//Функция вывода ошибки
function fail($str, $id = true)
{
    echo '<title>РНР- Ошибка</title>';
    echo '<link rel="stylesheet" href="../style.css">';
    if ($id) {
        echo "<p>Пожалуйста, укажите $str.</p>";
    } else {
        echo "<p>$str.</p>";
    }
    echo "<p><a href='../form/autoreg.php'>Заполнить заново</a></p>";
    exit();
}

//Функция авторизации
function autoreg($dbc)
{
    $result = mysqli_query($dbc, 'SELECT Номер_телефона, Хэш, ВУ, Администратор FROM users WHERE Номер_телефона = \'' . $_POST['number'] . '\';');
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_array($result);
        if (password_verify($_POST['password'], $result[1])) {
            session_start();
            if ($result[3] > 0) {
                setcookie('Admin', true, time()+36000, "/");
            }
            setcookie('Licence', $result[2], time()+36000, "/");
            return true;
        }
    }
    return false;
}

//Проверка авторизации
if (!(count($_POST) > 3)) {
    //Подключение БД
    require('../connect_bd.php');
    if (autoreg($dbc)) {
        //Перессылка на главную
        header('Location: ../index.php');
    } else {
        fail('Неправильно введены данные', false);
    }
} else {
    //Проверки
    if (!empty(trim($_POST['name']))) {
        $name = trim(addslashes($_POST['name']));
    } else {
        fail('имя');
    }

    if (!empty(trim($_POST['surname']))) {
        $surname = trim(addslashes($_POST['surname']));
    } else {
        fail('фамилию');
    }

    if (!empty(trim($_POST['sursurname']))) {
        $sursurname = trim(addslashes($_POST['sursurname']));
    } else {
        fail('отчество');
    }

    if (!empty($_POST['password'])) {
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
        fail('пароль');
    }

    if (!empty(trim($_POST['licence']))) {
        $licence = trim(addslashes($_POST['licence']));
    } else {
        fail('серию и номер ВУ');
    }

    if (!empty(trim($_POST['phone']))) {
        $phone = trim(addslashes($_POST['phone']));
    } else {
        fail('номер телефона');
    }
    //Подключение БД
    require('../connect_bd.php');
    //Запрос БД
    $sql = "INSERT INTO users (Имя, Фамилия, Отчество, ВУ, Номер_телефона,Хэш,Администратор)
    VALUES
    ('$name','$surname','$sursurname','$licence','$phone','$hash',0)";
    mysqli_query($dbc, $sql);
    //Старт сессии
    session_start();
    //Создание куков
    setcookie('Licence', $licence, time()+36000, "/");
    //Перессылка на главную
    header('Location: ../index.php');

}
