<HTML>
<TITLE>Вилучити постачальника</TITLE>
<HEAD>
</head>
<BODY>
<?php
if (isset($_POST['id_met'])) {$id_met=$_POST['id_met'];}
$id=mysql_connect('www.towaroobig.ua','root') or die ("Неможливо підключитись до серверу");
mysql_select_db('postachalnuku') or die("БД не вибрана");
$query="DELETE FROM metod WHERE id_met='$id_met'";
$result=mysql_query($query);
if($result){echo "Вилучено";}
else {echo "Помилка,не вилучено";} 
mysql_close($id);
?>
<p><a href="admin.php">Повернутись на адміністрато-ра>>></a></p>
<p><a href="../index.php">Повернутись на головну сторін-ку>>></a></p>
</body>
</html>
