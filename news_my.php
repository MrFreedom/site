<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>MyFootball</title>
    </head>
    <body>
    <h2>Новини</h2>
<?php
echo "<a href='delete_and_edit_news.php'>Видалити чи редагувати дані</a><br>";
function text_dl($text) { 
	$dl = 150;
	if (strlen($text) > $dl) { 
        $rest = substr($text, 0, $dl);      
        return $rest . '...</a>'; 
    } 
	else { 
		return $text; 
	}
}

$db = mysql_connect ("localhost","root","petya007");
mysql_select_db("register",$db);
mysql_set_charset("utf8");
$result = mysql_query("SELECT * FROM news WHERE number='1'",$db);

while($myrow = mysql_fetch_assoc($result))
{
    echo $myrow['number']. '<br>';
	echo $myrow['title']. '<br>';
	echo text_dl($myrow['text']) . "<a href='function_1.php'>Читати повністю...</a><br>";
	
	}



$db = mysql_connect ("localhost","root","petya007");
mysql_select_db("register",$db);
mysql_set_charset("utf8");
$result = mysql_query("SELECT * FROM news WHERE number='2'",$db);

while($myrow = mysql_fetch_assoc($result)) {
    echo $myrow['number']. '<br>';
	echo $myrow['title']. '<br>';
	echo text_dl($myrow['text']) . "<a href='function_2.php'>Читати повністю...</a><br>";
	}


$db = mysql_connect ("localhost","root","petya007");
mysql_select_db("register",$db);
mysql_set_charset("utf8");
$result = mysql_query("SELECT * FROM news WHERE number='3'",$db);

while($myrow = mysql_fetch_assoc($result)) {
    echo $myrow['number']. '<br>';
	echo $myrow['title']. '<br>';
	echo text_dl($myrow['text']) . "<a href='function_3.php'>Читати повністю...</a><br>";
	}	
	
?>