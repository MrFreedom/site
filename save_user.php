<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	if (isset($_POST['re_password'])) { $re_password=$_POST['re_password']; if ($re_password =='') { unset($re_password);} }
	if (isset($_POST['e_mail'])) { $e_mail=$_POST['e_mail']; if ($e_mail =='') { unset($e_mail);} }
	
    //заносимо дані у оголошені змінні $login i $password
 if (empty($login) or empty($password) or empty ($re_password) or empty ($e_mail)) //якщо користувач не ввів якісь дані,оголошуємо помилку
    {
    exit ("Ви ввели не всю інформацію.Поверніться назад!");
    }
    //обробляємо логін і пароль
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $re_password = stripslashes($re_password);
    $re_password = htmlspecialchars($re_password);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$e_mail = stripslashes($e_mail);
    $e_mail = htmlspecialchars($e_mail);
 //видаляємо зайві пробіли
    $login = trim($login);
	$re_password = trim($re_password);
    $password = trim($password);
	$e_mail = trim($e_mail);
	$email = "example@exa mple.com";

if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)){
         exit ("E-mail невірний");
}else{
         echo "E-mail вірний </br>";
}
 // підключаємося до бази
    include ("bd.php");
 // перевірка на існування користувача з таким же логіном
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Вибачте,але користувач з таким логіном вже існує.Введіть інший логін");
    }
	
	// перевірка на співпадіння паролів
    if ($re_password != $password) {
    exit ("Паролі не співпадають.");
    }
	
	// перевірка на існування користувача з таким же e-mail
    $result = mysql_query("SELECT id FROM users WHERE login='$e_mail'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Вибачте,але дана електронна пошта вже використовується.Введіть іншу");
    }
	
 // якщо такого немає,то збергіаємо дані
    $result2 = mysql_query ("INSERT INTO users (login,password,e_mail) VALUES('$login','$password','$e_mail')");
    // перевіряємо,чи є помилки
    if ($result2=='TRUE')
    {
    echo "Вы успішно зареєестровані.Тепер ви можете зайти на сайт <a href='news_my.php'>Новини</a>";
    }
 else {
    echo "Помилка!Ви не зареєстровані!";
    }
    ?>