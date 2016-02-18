<HTML>
<BODY>
<?php
if (isset($_POST['nazv'])) {$nazv=$_POST['nazv'];} 
if (isset($_POST['id_aut'])) {$id_aut=$_POST['id_aut'];}
if (isset($_POST['year'])) {$year=$_POST['year'];} 
if (isset($_POST['id_razd'])) {$id_razd=$_POST['id_razd'];} 
if (isset($_POST['razm'])) {$razm=$_POST['razm'];}
$id=mysql_connect('localhost','root') or die ("Неможливо підключитися до сервера");
mysql_select_db('metodichki') or die("БД не обрана");
$query="INSERT  INTO  metod VALUES('','$id_aut','$id_razd','$nazv','$year','$razm')";
$result=mysql_query($query);
if($result){echo "Дані успішно внесені";}
else {echo "Дані не внесені";} 
mysql_close($id);
?>
<p><a href="adm.php">Повернутись на сторінку адміністратора>>></a></p>
<p><a href="../index.php">Повернутись на головну сторін-ку>>></a></p>
</body>
</html>
