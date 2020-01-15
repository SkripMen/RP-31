<?php
//Удаление куков
session_start();
unset($_COOKIE['Licence']);
unset($_COOKIE['Admin']);
SetCookie("Licence","", time()-36000, "/");
SetCookie("Admin","", time()-36000, "/");
session_destroy();
//Перессылка на главную
header('Location: index.php');