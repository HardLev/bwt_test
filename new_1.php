<?php
$link = mysql_connect("localhost", "mysql_user", "mysql_password");
$id=mysql_connect('localhost','root') or die ("Невозможно подключиться к серверу!"); 
mysql_select_db('Товарообіг', $link) or die("БД не выбрана.");
mysql_query("SET NAMES 'cp1251_general_ci';");  
$result=mysql_query("SELECT news_zagolovok,news_url,news_id FROM news ORDER BY news_date desc"); 
while($met=mysql_fetch_row($result)) 
{
	$k = 0;
	$result2=mysql_query("SELECT comment FROM komment WHERE news_id = $met[2]"); 
	while($met2=mysql_fetch_row($result2))
	{
	$k+=1;		
	}

	echo "<div id='news_l'><a href = 'News_open.php?news=$met[1]&id=$met[2]&num=$k' class='but'><p class='news_small' > $met[0] </p></a></div>";
	echo "<div id='news'>";
	$r=fopen($met[1],'r');
	$text=fread($r,filesize($met[1]));
	echo $text;
	echo "</div>";
	echo "<div id='news' ><b class = 'komment'>Коментарии: ".$k."<b></div><br>";


	
} 
?> 