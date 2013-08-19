<?php
    //початок сесії
    session_start();

    ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://validator.w3.org/">

<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>MyFootball</title>
    </head>
    <body>
    <h2>Головна сторінка</h2>
	Ми раді бачити вас на нашому сайті.Тут ви знайдете цікаві новини із світу футболу,нові трансфери та статті про гру мільйонів.Щоб переглянути їх,потрібно зареєструватися!

<form action="testreg.php" method="post">

 <p>
    <label>Ваш логін:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>

    <p>

    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <p>
    <input type="submit" name="submit" value="Войти">

    <a href="reg.php"><br>Зареєструватися</br></a> 
<br>
