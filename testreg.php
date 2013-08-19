<?php
    session_start();// початок сесії
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносимо дані у оголошені змінні $login i $password
if (empty($login) or empty($password)) //якщо користувач не ввів якісь дані,оголошуємо помилку
    {
    exit ("Ви ввели не всю інформацію.Поверніться назад!");
    }
    //обробляємо логін і пароль
    $login = stripslashes($login);//захист полів
    $login = htmlspecialchars($login);//захист полів
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//видаляємо зайві пробіли
    $login = trim($login);
    $password = trim($password);
// підключаємося до бази
    include ("bd.php");
 
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); //вихоплюємо з бази усі дані
    $myrow = mysql_fetch_array($result);
	
    if (empty($myrow['password']))
    {
    //якщо користувача не існує:
    exit ("Вибачте,введений вами логін чи пароль невірний.");
    }
    else {
    //якщо існує,то перевіряємо пароль...
    if ($myrow['password']==$password) {
    //якщо паролі співпадають,запускаємо сесію
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];
	
    echo "Вітаємо!Ви успішно зайшли на сайт! <a href='news_my.php'>Новини</a>";
    }
 else {
    //якщо паролі не співпадають

    exit ("Вибачте,введений вами логін чи пароль невірний.");
    }
    }
    ?>