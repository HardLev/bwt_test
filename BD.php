<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-860" />
	<title> База даних </title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	</head>
<body>
 <table cellpadding="0" cellspacing="0" width="860" align="center">
   <tr>
     <td colspan="3" class="header"> &nbsp; 
	 
	 </td>
   </tr>
   <tr>
     <td class="left_col">
       <?php
	     include("menu1.php")
		?> 
     </td>
     <td class="center_col">
       <?php 
$id=mysql_connect('localhost','root') or die ("Невозможно подключиться к серверу!"); 
mysql_select_db('stop4play') or die("БД не выбрана.");
mysql_query("SET NAMES 'utf8';");  
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
      </td>
    </tr>
    <tr>
      <td colspan="3" class="footer"> © ТЦ 2015 </td>
   </table>
  </body>
</html>