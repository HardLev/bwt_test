<HTML>
<TITLE>Адміністратор</TITLE>
<HEAD>
</head>
<BODY>
<div align="center">
<h3>Сторінка адміністратора</h3>
<h4>Методичні псібники</h4>
<?php
$id=mysql_connect('localhost','root') or die ("Неможливо підключитись до серверу");
mysql_select_db('metodichki') or die("БД не вибрана");
if (isset($_POST['insert']))
{
	if (isset($_POST['nazv'])) {$nazv=$_POST['nazv'];} 
	if (isset($_POST['id_aut'])) {$id_aut=$_POST['id_aut'];}
	if (isset($_POST['year'])) {$year=$_POST['year'];} 
	if (isset($_POST['id_razd'])) {$id_razd=$_POST['id_razd'];} 
	if (isset($_POST['razm'])) {$razm=$_POST['razm'];}
	$query="INSERT INTO metod VALUES('','$id_aut','$id_razd','$nazv','$year','$razm')";
	$result1=mysql_query($query) or die('Дані не внесені');
}
if (isset($_POST['delete']))
{
	if (isset($_POST['id_met'])) {$id_met=$_POST['id_met'];}
	$query="DELETE FROM metod WHERE id_met='$id_met'";
	$result2=mysql_query($query);
}
$result3=mysql_query("SELECT * FROM metod") or die ("Запит не виконано");
echo "<table cellpadding=0 cellspacing=0 border=0 >\n";

while ($myrow=mysql_fetch_row($result3))
{
printf("<tr><td>%s</td><td>%s</td></tr>\n", $myrow[0],$myrow[3]);

}
echo "</table>\n";
?>
<br>
<table cellpadding=10 cellspacing=0 border="1" >
<tr valign="top">
<td>
<h4>Додати в базу новий  посібник</h4>
<form method="POST" action="" >
Назва <br>
<textarea  name="nazv" cols="32" rows="2"></textarea>
<table>
 <tr>
<td>Автор
<td>
<select name="id_aut">
<?php
$result4=mysql_query("SELECT * FROM autors");
while($au=mysql_fetch_row($result4))
{echo "<option value='$au[0]'>$au[1]</option>\n";}
?>
</select>
</td>
</tr>
<tr>
<td>Розділ</td>
<td>
<select name="id_razd">
<?php
$result5=mysql_query("SELECT * FROM razdel");
while($raz=mysql_fetch_row($result5))
{echo "<option value='$raz[0]'>$raz[1]</option>\n";}
?>
</select>
</td></tr>
<tr>
<td>Рік видання</td>
<td>
<input type="text" name="year">
</td></tr>
<tr>
<td>Кількість сторінок</td>
<td>
<input type="text" name="razm">
</td></tr>
<tr>
<td>
<input type="submit" name="insert" value="Додати">
</td>
<td>
<input type="reset" value="Очистити">
</td>
</tr>
</table>
</form>
</td>
</tr>
<tr>
<td>
<h4>Видалити посібник з бази</h4>
<form method="POST" action="">
<select name="id_met">
<?php
$result6=mysql_query("SELECT * FROM metod");
while($met=mysql_fetch_row($result6))
{echo "<option value='$met[0]'> $met[0] $met[3]</option>\n";}
mysql_close($id);
?>
</select>
<p>
<input type="submit" name="delete" value="Видалити">
</p>
</form>
</td>
</tr>
</table>
</div>
</body>
</html>
