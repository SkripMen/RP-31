<?php
//Подключение CSS
echo '<link rel="stylesheet" href="../style.css">';
//Форма авторизации пользователя
echo '<div id="reg"><form action="../process/process_user.php" method="post">
<p>
    <p>Ваш номер телефона:<br></p>
    <input name="number" type="text" size="15" maxlength="15">
    </p>
<p>
    <p>Ваш пароль:<br></p>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
<p>
    <input id="butt" type="submit" name="submit" value="Вход">
</p>
</form>
<p id="butreg"><a href="reg.php">Зарегестрироваться</a></p>
</div>';
