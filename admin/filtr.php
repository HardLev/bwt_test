<?Php
$id=mysql_connect('localhost','root') or die ("неможливо підключитись до серверу");
mysql_select_db('jockey') or die("бд не вибрана"); 
mysql_set_charset('utf8');
?>
<form method="POST" action="">
<p><strong>Жанр:</strong>
<select name="janr">
<option  value="0">Все жанры</option>
<?Php
$res1=mysql_query("SELECT * FROM janr ");
while($ja=mysql_fetch_row($res1))
{echo "<option value='$ja[0]'> $ja[1]</option>\n";}
 echo '</select>';
 echo '<input type="submit" name="send" value="вибрати"><br><br>';
echo '</form>';
if(isset($_POST['send']))
{
if(isset($_POST['janr'])){$janr=$_POST['janr'];}
if ($janr>0){$b1="janr.id_janr=$janr";} else {$b1="film.id_janr>0  ";}
$b2="film.id_janr=janr.id_janr";
$b4=$b1." AND ".$b2; 
$ath = mysql_query("SELECT 
film.nazv, film.jpeg, film.year, rejjeser.name, janr.janr, film.strana, film.online
FROM film
LEFT JOIN janr ON film.id_janr=janr.id_janr
LEFT JOIN rejjeser ON film.id_rej = rejjeser.id_rej
WHERE $b4");

if($ath)
{
	while($row = mysql_fetch_row($ath))
	{
echo '<br><img src ="'.$row[1].'" width=200 height=200 align="left" /></br>';
    echo "<br>Назва: ".$row[0]."</br>";
    echo "<br>Год: ".$row[2]."</br>";
echo "<br>Страна: ".$row[5]."</br>";
echo "<br>Жанр: ".$row[4]."</br>";
echo "<br>Режиссёр: ".$row[3]."</br>";
}

} 
}
mysql_close($id);
 ?>     
