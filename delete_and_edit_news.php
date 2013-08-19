<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://validator.w3.org/">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

session_start();

require("config.php");
mysql_set_charset("utf8");

if (isset($_SESSION['login']))
{
$a = '<input type="image" src="http://www.iconshock.com/img_jpg/REALVISTA/general/jpg/128/cross_icon.jpg" width="35px">';
}
else
{
echo "Ви не можете виконувати цю дію,поки не <a href='auth.php'>авторизуєтеся</a>";
$a =  '<input type="image" src="http://www.iconshock.com/img_jpg/REALVISTA/general/jpg/128/cross_icon.jpg" width="35px" disabled>';

}
$arrResult = array();
$result = mysql_query('select number from news');
while ($data = mysql_fetch_array($result)) {
  $number[] = $data['number'];
}
    $arrResult1 = array();
$result1 = mysql_query('select title from news');
while ($data1 = mysql_fetch_array($result1)) {
  $title[] = $data1['title'];
}

    $arrResult2 = array();
$result2 = mysql_query("SELECT SUBSTRING(`text`, 1, 150) AS `text` FROM `news`");
while ($data2 = mysql_fetch_array($result2)) {
  $text[] = $data2['text'];
}

echo '<table><thead>
    <tr>
        <th>Номер</th>
        <th>Название</th>
        <th>Текст</th>
    </tr>
    </thead><tbody>';
    if(empty($number))  echo ' ';
		else {
	for($i = 0; $i < sizeof($number); $i++)
	{
	print_r('<tr><td>'.$number[$i].'</td><td>'.$title[$i].'</td><td>'.$text[$i].'</td><td> <form method="get" action="script_edit_news.php"><input type="hidden" name="number" id="number" value="'.$number[$i].'"><input type="image" src="http://iconizer.net/files/IconSweets_2/orig/edit_pencil.png" width="20px"'.$a.'></form><form method="post"><input type="hidden" name="number" id="number" value="'.$number[$i].'"><input type="image" src="http://iconizer.net/files/Flavour_Extended/orig/button_delete_red.png" width="20px"></form></td></tr>');
	}

	echo '</tbody></table>';
	}
?>


<?php
if(empty($_POST['number']))  echo ' ';
		else {
	$number = $_POST['number'];
	$sql = "DELETE FROM `news` WHERE `number`=$number" ;
	$query = mysql_query($sql);
	}
MYSQL_CLOSE();

?>
